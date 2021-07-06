<?php

/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Header;

use NoreSources\Http\RFC7230;

class AcceptCharsetHeaderValue implements HeaderValueInterface,
	\NoreSources\Http\QualityValueInterface
{
	use \NoreSources\Http\QualityValueTrait;

	/**
	 * Special charset value to tell any charset is accepted.
	 *
	 * @var string
	 */
	const ANY = '*';

	public function __construct($charset)
	{
		$this->charset = $charset;
	}

	public function __toString()
	{
		$s = $this->charset;
		if ($this->getQualityValue() < 1)
			$s .= '; ' . $this->getQualityValueParameterString();
		return $s;
	}

	/**
	 *
	 * @return string
	 */
	public function getCharset()
	{
		return $this->charset;
	}

	public static function parseFieldValueString($text)
	{
		$semicolon = \strpos($text, ';');
		if ($semicolon === false)
		{
			$charset = \trim($text);
			$length = \strlen($text);
		}
		else
		{
			$charset = \trim(\substr($text, 0, $semicolon));
			$length = $semicolon + 1;
		}

		if (!($charset == self::ANY ||
			\preg_match(chr(1) . RFC7230::TOKEN_PATTERN . chr(1), $charset)))
			throw new InvalidHeaderException('Invalid charset value',
				InvalidHeaderException::INVALID_HEADER_VALUE);

		return [
			new AcceptCharsetHeaderValue($charset),
			$length
		];
	}

	/**
	 *
	 * @var string
	 */
	private $charset;
}
