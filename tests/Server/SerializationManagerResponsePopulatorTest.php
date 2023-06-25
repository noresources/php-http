<?php
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Response\TextResponse;
use NoreSources\Http\StreamManager;
use NoreSources\Http\Header\HeaderField;
use NoreSources\Http\Server\SerializationManagerResponsePopulator;
use NoreSources\MediaType\MediaTypeFactory;
use NoreSources\Test\DerivedFileTestTrait;
?>
w<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
class SerializationManagerResponsePopulatorTest extends \PHPUnit\Framework\TestCase
{
	use DerivedFileTestTrait;

	public function setUp(): void
	{
		$this->initializeDerivedFileTest(__DIR__ . '/..');
	}

	public function tearDown(): void
	{
		$this->cleanupDerivedFileTest();
	}

	public function testJSON()
	{
		$populator = new SerializationManagerResponsePopulator();
		$serializer = $populator->getSerializer();
		$sm = StreamManager::getInstance();
		$mediaType = MediaTypeFactory::getInstance()->createFromString(
			'application/json');
		$data = [
			'type' => 'object',
			'format' => 'json'
		];

		if (!$serializer->isMediaTypeSerializable($mediaType))
		{
			$this->assertFalse(false, 'JSON extension not loaded ?');
			return;
		}

		$method = __METHOD__;
		$suffix = null;

		$body = $sm->createFileStream('php://temp', 'w');
		$stream = $sm->getStreamResource($body);

		$response = new TextResponse('');
		$response = $response->withBody($body);

		$request = ServerRequestFactory::fromGlobals();
		$request = $request->withHeader(HeaderField::ACCEPT,
			\strval($mediaType));

		{
			$requestText = \Laminas\Diactoros\Request\Serializer::toString(
				$request);
			$extension = 'request';
			$this->assertDerivedFile($requestText . PHP_EOL, $method,
				$suffix, $extension);
		}

		$response = $populator->populateResponse($response, $request,
			$data);

		//

		{
			$extension = 'response';
			if ($response->getBody()->isSeekable())
				$response->getBody()->rewind();
			$responseText = \Laminas\Diactoros\Response\Serializer::toString(
				$response);
			$this->assertDerivedFile($responseText . PHP_EOL, $method,
				$suffix, $extension);
		}
	}
}
