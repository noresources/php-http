<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package Http
 */
namespace NoreSources\Http\Server;

use NoreSources\StructuredText;
use NoreSources\TypeConversionException;
use NoreSources\Http\Header\ContentTypeHeaderValue;
use NoreSources\Http\Header\Header;
use NoreSources\Http\Header\HeaderValueFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class StructuredTextRequestBodyParserMiddleware implements MiddlewareInterface
{

	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		if (!$request->hasHeader(Header::CONTENT_TYPE))
			return $handler->handle($request);

		/**
		 *
		 * @var ContentTypeHeaderValue $contentType
		 */
		$contentType = HeaderValueFactory::fromRequest($request, Header::CONTENT_TYPE);
		$format = StructuredText::mediaTypeFormat(\strval($contentType->getValue()));

		if ($format === false)
			return $handler->handle($request);

		try
		{
			$request->getBody()->rewind();
			$data = StructuredText::textToArray($request->getBody()->getContents(), $format);

			return $handler->handle($request->withParsedBody($data));
		}
		catch (TypeConversionException $e)
		{
			return $handler->handle($request);
		}
	}
}
