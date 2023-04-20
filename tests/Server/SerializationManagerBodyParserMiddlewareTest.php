<?php
/**
 * Copyright © 2012 - 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http;

use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response\JsonResponse;
use NoreSources\Container\Container;
use NoreSources\Http\Header\HeaderField;
use NoreSources\Http\Request\LiteralValueRequestBody;
use NoreSources\Http\Server\SerializationManagerBodyParserMiddleware;
use NoreSources\Http\Test\ClosureRequestHandler;
use NoreSources\Http\Test\Utility;
use Psr\Http\Message\ServerRequestInterface;

final class SerializationManagerBodyParserMiddlewareTest extends \PHPUnit\Framework\TestCase
{

	public function testSerializationManagerBodyParserMiddleware()
	{
		$tests = [
			'Plain text' => [
				HeaderField::CONTENT_TYPE => 'text/plain',
				'body' => 'Hello world'
			],
			'URL encoded text' => [
				HeaderField::CONTENT_TYPE => 'application/x-www-form-urlencoded',
				'body' => \urlencode('Hello world!'),
				'expected' => []
			],
			'URL encoded text (PUT)' => [
				'method' => 'PUT',
				HeaderField::CONTENT_TYPE => 'application/x-www-form-urlencoded',
				'body' => \urlencode('Hello world!'),
				'expected' => 'Hello world!'
			],
			'URL encoded text (inhibit default)' => [
				HeaderField::CONTENT_TYPE => 'application/x-www-form-urlencoded',
				'flags' => SerializationManagerBodyParserMiddleware::INHIBIT_POST_ARRAY_COMPLIANCE,
				'body' => \urlencode('Hello world!'),
				'expected' => 'Hello world!'
			],
			'JSON' => [
				HeaderField::CONTENT_TYPE => 'application/json',
				'body' => \json_encode('Hello world!'),
				'expected' => 'Hello world!'
			]
		];

		$factory = new ServerRequestFactory();

		foreach ($tests as $label => $test)
		{
			$method = Container::keyValue($test, 'method', 'POST');
			$flags = Container::keyValue($test, 'flags', 0);
			$contentType = Container::keyValue($test,
				HeaderField::CONTENT_TYPE);
			$body = Container::keyValue($test, 'body');
			$expected = Container::keyValue($test, 'expected', $body);
			$preParsed = null;
			if (Container::keyExists($test, 'preParsed'))
				$preParsed = Container::keyValue($test, 'preParsed');
			elseif ($method == 'POST' &&
				\in_array($contentType,
					[
						'application/x-www-form-urlencoded',
						'multipart/form-data'
					]))
			{
				$preParsed = [];
			}

			$label = $method . '[' . $flags . '] ' . $label;

			$middleware = new SerializationManagerBodyParserMiddleware();
			$middleware->setFlags($flags);

			$body = Utility::createStreamFromText($body);
			$request = $factory->createServerRequest($method, '/foo/bar')
				->withHeader(HeaderField::CONTENT_TYPE, $contentType)
				->withBody($body);
			$this->assertInstanceOf(ServerRequestInterface::class,
				$request);

			$request = $request->withParsedBody($preParsed);
			$this->assertEquals($preParsed, $request->getParsedBody(),
				$label . ' initial parsed body');

			$handler = new ClosureRequestHandler(
				function (ServerRequestInterface $request) use (
				$expected, $label) {
					$parsed = $request->getParsedBody();
					if ($parsed instanceof LiteralValueRequestBody)
						$parsed = $parsed->getLiteralValue();
					$this->assertEquals($expected, $parsed,
						$label . ' value');
					return new JsonResponse($parsed);
				});

			try
			{
				$middleware->process($request, $handler);
			}
			catch (\ErrorException $e)
			{
				$this->assertInstanceOf($expected, $e,
					$label . ' should throw ' . $expected);
			}
		}
	}
}
