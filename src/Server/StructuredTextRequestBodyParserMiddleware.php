<?php
/**
 * Copyright © 2012 - 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Server;

use NoreSources\Data\Serialization\DataSerializationException;
use NoreSources\Data\Serialization\DataSerializationManager;
use NoreSources\Http\Header\ContentTypeHeaderValue;
use NoreSources\Http\Header\HeaderField;
use NoreSources\Http\Header\HeaderValueFactory;
use NoreSources\Http\Request\LiteralValueRequestBody;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 *
 * @deprecated Use DataSerializationBodyParserMiddleware
 *
 */
class StructuredTextRequestBodyParserMiddleware implements
	MiddlewareInterface
{

	public function __construct(
		DataSerializationManager $deserializer = null)
	{
		$this->deserializer = $deserializer;
		if (!$deserializer)
			$this->deserializer = new DataSerializationManager();
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
		$body = $request->getBody();
		if ($body->isSeekable())
			$body->rewind();
		$contents = $body->getContents();

		if (!$this->deserializer->canUnserializeData($contents,
			$mediaType))
			return $handler->handle($request);

		try
		{
			$data = $this->deserializer->unserializeData($contents,
				$mediaType);
			if (!(\is_object($data) || \is_array($data)))
				$data = new LiteralValueRequestBody($data);

			return $handler->handle($request->withParsedBody($data));
		}
		catch (DataSerializationException $e)
		{}

		return $handler->handle($request);
	}

	/**
	 *
	 * @var DataSerializationManager
	 */
	private $deserializer;
}
