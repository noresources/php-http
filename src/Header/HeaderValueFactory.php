<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package Http
 */
namespace NoreSources\Http\Header;

use NoreSources\Container;
use NoreSources\Http\ParameterMapProviderInterface;
use NoreSources\Http\ParameterMapSerializer;
use NoreSources\Http\QualityValueInterface;
use NoreSources\Http\RFC7230;
use Psr\Http\Message\RequestInterface;

class HeaderValueFactory
{

	/**
	 *
	 * @param string $headerName
	 * @param RequestInterface $request
	 * @param boolean $multiple
	 * @return AlternativeValueListInterface|HeaderValueInterface
	 */
	public static function fromRequest(RequestInterface $request, $headerName, $multiple = false)
	{
		if (!$request->hasHeader($headerName))
			return ($multiple) ? array() : null;

		$headerValues = $request->getHeader($headerName);

		if ($multiple)
		{
			$values = [];
			foreach ($headerValues as $headerValue)
			{
				$values[] = self::fromKeyValue($headerName, $headerValue);
			}

			return $values;
		}

		$headerValue = Container::firstValue($headerValues);
		return self::fromKeyValue($headerName, $headerValue);
	}

	/**
	 *
	 * @param string $headerLine
	 * @param boolean $returnKeyValue
	 *        	If true, return an arraycontaining the header name and header value
	 * @throws InvalidHeaderException::
	 * @return HeaderValueInterface|array The header value or an array [name, value] if
	 *         $returnKeyValue is true
	 */
	public static function fromHeaderLine($headerLine, $returnKeyValue = false)
	{
		$pattern = '(' . RFC7230::TOKEN_PATTERN . '):' . RFC7230::OWS_PATTERN . '(.*)';
		$m = [];
		if (!\preg_match(chr(1) . $pattern . chr(1) . 'i', $headerLine, $m))
			throw new InvalidHeaderException($pattern, InvalidHeaderException::INVALID_HEADER_LINE);

		try
		{
			$value = self::fromKeyValue($m[1], $m[2]);
		}
		catch (\Exception $e)
		{
			throw new InvalidHeaderException($e->getMessage(),
				InvalidHeaderException::INVALID_HEADER_VALUE);
		}

		if ($returnKeyValue)
			return [
				$m[1],
				$value
			];
		return $value;
	}

	/**
	 *
	 * @param string $headerName
	 * @param string $headerValue
	 * @return AlternativeValueListInterface|HeaderValueInterface
	 */
	public static function fromKeyValue($headerName, $headerValue)
	{
		list ($alternativeValueListClassname, $headerValueClassName) = self::getHeaderValueClassnames(
			$headerName);

		if (!(\class_exists($headerValueClassName) &&
			($reflection = new \ReflectionClass($headerValueClassName)) &&
			$reflection->implementsInterface(HeaderValueInterface::class)))
		{
			$headerValueClassName = TextHeaderValue::class;
		}

		// Alternative list values

		if (\class_exists($alternativeValueListClassname) &&
			($reflection = new \ReflectionClass($alternativeValueListClassname)) &&
			$reflection->implementsInterface(AlternativeValueListInterface::class))
		{
			if ($reflection->hasMethod('fromString'))
				return \call_user_func([
					$alternativeValueListClassname,
					'fromString'
				], $headerValue);

			$listValueClassName = $headerValueClassName;
			if ($reflection->hasConstant('HEADERVALUE_CLASSNAME'))
				$listValueClassName = $reflection->getConstant('HEADERVALUE_CLASSNAME');

			$list = \explode(',', $headerValue);
			$valueReflection = new \ReflectionClass($listValueClassName);
			$values = [];
			foreach ($list as $textValue)
			{
				$values[] = self::parseHeaderValue($textValue, $valueReflection);
			}

			return $reflection->newInstanceArgs([
				$values
			]);
		}

		// Simple value

		if (\class_exists($headerValueClassName) &&
			($reflection = new \ReflectionClass($headerValueClassName)) &&
			$reflection->implementsInterface(HeaderValueInterface::class))
		{
			if ($reflection->hasMethod('fromString'))
				return \call_user_func([
					$headerValueClassName,
					'fromString'
				], $headerValue);

			return self::parseHeaderValue($headerValue, $reflection);
		}
		/*
		 * Fallback
		 */
		return new TextHeaderValue($headerValue);
	}

	/**
	 * Get the expected Header value class names for the given header name
	 *
	 * @param string $headerName
	 *        	Header field name
	 * @return string[] AlternativeValueList and HeaderValue class names
	 */
	public static function getHeaderValueClassnames($headerName)
	{
		$camelCaseHeeaderName = Container::implodeValues(explode('-', \strtolower($headerName)), '',
			function ($part) {
				return strtoupper(\substr($part, 0, 1)) . \strtolower(\substr($part, 1));
			});

		return [
			(__NAMESPACE__ . '\\' . $camelCaseHeeaderName . 'AlternativeValueList'),
			(__NAMESPACE__ . '\\' . $camelCaseHeeaderName . 'HeaderValue')
		];
	}

	private static function parseHeaderValue($headerValueText, \ReflectionClass $headerValueClass)
	{
		$valueClassName = null;
		$valueClass = null;
		if ($headerValueClass->hasConstant('VALUE_CLASS_NAME') &&
			($valueClassName = $headerValueClass->getConstant('VALUE_CLASS_NAME')) &&
			\class_exists($valueClassName))
			$valueClass = new \ReflectionClass($valueClassName);

		$hasParameters = ($headerValueClass->implementsInterface(
			ParameterMapProviderInterface::class) ||
			$headerValueClass->implementsInterface(QualityValueInterface::class) ||
			($valueClass && $valueClass->implementsInterface(ParameterMapProviderInterface::class)));

		$parametersBefore = new \ArrayObject();
		$parametersAfter = new \ArrayObject();
		$qualityValue = null;

		if ($hasParameters)
		{
			$semicolon = \strpos($headerValueText, ';');
			if ($semicolon !== false)
			{
				$parametersText = \trim(\substr($headerValueText, $semicolon + 1));
				$headerValueText = \trim(\substr($headerValueText, 0, $semicolon));

				$consumed = ParameterMapSerializer::unserializeParameters($parametersBefore,
					$parametersText,
					function ($name, $value) use ($headerValueClass, &$qualityValue,
					$parametersAfter) {

						if ($qualityValue !== null)
						{
							$parametersAfter->offsetSet($name, $value);
							return 0;
						}

						if ($name == 'q' &&
						$headerValueClass->implementsInterface(QualityValueInterface::class))
						{
							$qualityValue = floatval($value);
							return 0;
						}

						return 1;
					});
			}
		}

		/**
		 *
		 * @var HeaderValueInterface $headerValue
		 */
		$headerValue = $headerValueClass->newInstanceArgs([
			$headerValueText
		]);

		if ($headerValue instanceof QualityValueInterface)
			$headerValue->setQualityValue(\is_float($qualityValue) ? $qualityValue : 1.0);

		if ($headerValue->getValue() instanceof ParameterMapProviderInterface)
		{
			foreach ($parametersBefore as $name => $value)
			{
				$headerValue->getValue()
					->getParameters()
					->offsetSet($name, $value);
			}
		}
		elseif ($parametersBefore->count())
			$parametersAfter->exchangeArray(
				\array_merge($parametersBefore->getArrayCopy(), $parametersAfter->getArrayCopy()));

		if ($headerValue instanceof ParameterMapProviderInterface)
		{
			foreach ($parametersAfter as $name => $value)
				$headerValue->getParameters()->offsetSet($name, $value);
		}

		return $headerValue;
	}
}
