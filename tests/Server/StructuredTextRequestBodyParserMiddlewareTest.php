<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package Http
 */
namespace NoreSources\Http;

use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\PhpInputStream;
use Laminas\Diactoros\Stream;
use NoreSources\Http\Test\Utility;
use NoreSources\Http\Server\StructuredTextRequestBodyParserMiddleware;
use Laminas\Diactoros\Response\JsonResponse;
use NoreSources\Http\ClosureRequestHandler;

final class StructuredTextParserTest extends \PHPUnit\Framework\TestCase
{

	public function testStructuredTextBodyParser()
	{
		$data = [
			'Hellow' => 'world'
		];
		$json = \json_encode($data);

		$body = Utility::createStreamFromText($json);

		$request = ServerRequestFactory::createServerRequest('POST', '/foo/bar')->withHeader(
			'Content-Type', 'application/json')->withBody($body);

		$this->assertInstanceOf(ServerRequestInterface::class, $request);

		$this->assertEquals($json, $request->getBody()
			->getContents());

		$mw = new StructuredTextRequestBodyParserMiddleware();

		$handler = new ClosureRequestHandler(
			function (ServerRequestInterface $request) use ($data) {
				$this->assertEquals($data, $request->getParsedBody());
				return new JsonResponse($request->getParsedBody());
			});
		$response = $mw->process($request, $handler);

		$body->close();
	}
}
