<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Server;

use NoreSources\Bitset;
use NoreSources\Data\Serialization\DataSerializationException;
use NoreSources\Data\Serialization\DataSerializationManager;
use NoreSources\Data\Serialization\DataUnserializerInterface;
use NoreSources\Http\Header\ContentTypeHeaderValue;
use NoreSources\Http\Header\HeaderField;
use NoreSources\Http\Header\HeaderValueFactory;
use NoreSources\Http\Request\LiteralValueRequestBody;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DataSerializationBodyParserMiddleware implements
	MiddlewareInterface
{

	/**
	 * Override $_POST
	 *
	 * According to documentation, getParsedBody() MUST
	 * return the same content as the $_POST array for
	 * POST methods with application/x-www-form-urlencoded'
	 * or multipart/form-data content-types.
	 * This flag allows to ignore this rule.
	 *
	 * @see https://www.php-fig.org/psr/psr-7/
	 * @var integer
	 */
	const INHIBIT_POST_ARRAY_COMPLIANCE = Bitset::BIT_01;

	/**
	 * Re-parse body even if parsed body already contains data.
	 *
	 * @var integer
	 */
	const REPARSE = Bitset::BIT_02;

	/**
	 *
	 * @param DataUnserializerInterface $deserializer
	 *        	Instance of deserializer to use. If not set, a default one will be created
	 */
	public function __construct(
		DataUnserializerInterface $deserializer = null)
	{
		if ($deserializer)
			$this->deserializer = $deserializer;
		$this->flags = 0;
	}

	public function process(ServerRequestInterface $request,
		RequestHandlerInterface $handler): ResponseInterface
	{
		if (!$request->hasHeader(HeaderField::CONTENT_TYPE))
			return $handler->handle($request);

		/**
		 *
		 * @var ContentTypeHeaderValue $contentType
		 */
		$contentType = HeaderValueFactory::createFromMessage($request,
			HeaderField::CONTENT_TYPE);
		$mediaType = $contentType->getMediaType();
		$flags = $this->getFlags();

		if ((($flags & self::INHIBIT_POST_ARRAY_COMPLIANCE) == 0) &&
			(\strcasecmp($request->getMethod(), 'POST') == 0))
		{
			$mts = \strval($mediaType);
			$excludes = [
				'application/x-www-form-urlencoded',
				'multipart/form-data'
			];
			if (\in_array($mts, $excludes))
				return $handler->handle($request);
		}

		// Check if already parsed
		$parsed = $request->getParsedBody();
		$reparse = (($flags & self::REPARSE) == self::REPARSE) ||
			(\is_array($parsed) && (\count($parsed) == 0)) ||
			\is_null($parsed);

		if (!$reparse)
			return $handler->handle($request);

		$deserializer = $this->getDataUnserializer();

		$body = $request->getBody();
		if ($body->isSeekable())
			$body->rewind();

		$data = \strval($body);
		try
		{
			$data = $deserializer->unserializeData($data, $mediaType);

			if (!(\is_array($data) || \is_null($data) ||
				\is_object($data)))
				$data = new LiteralValueRequestBody($data);
			return $handler->handle($request->withParsedBody($data));
		}
		catch (DataSerializationException $e)
		{
			var_dump($e->getMessage());
		}

		return $handler->handle($request);
	}

	/**
	 *
	 * @return DataUnserializerInterface
	 */
	public function getDataUnserializer()
	{
		if (!isset($this->deserializer))
		{
			$this->deserializer = new DataSerializationManager();
		}

		return $this->deserializer;
	}

	public function setFlags($flags)
	{
		$this->flags = $flags;
	}

	public function getFlags()
	{
		return $this->flags;
	}

	/**
	 *
	 * @var DataUnserializerInterface
	 */
	private $deserializer;

	/**
	 *
	 * @var integer
	 */
	private $flags;
}
