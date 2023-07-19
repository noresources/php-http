<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package Http
 */
use NoreSources\Http\Stream;
use NoreSources\Http\StreamManager;
use NoreSources\Http\StreamWrapper;
use NoreSources\Test\DerivedFileTestTrait;
use NoreSources\Type\TypeDescription;
use Psr\Http\Message\StreamInterface;

class StreamTest extends \PHPUnit\Framework\TestCase
{
	use DerivedFileTestTrait;

	public function setUp(): void
	{
		$this->initializeDerivedFileTest(__DIR__);
	}

	public function tearDown(): void
	{
		$this->cleanupDerivedFileTest();
	}

	public function testWrapper()
	{
		$method = __METHOD__;
		$suffix = null;
		$extension = 'txt';

		$derived = $this->getDerivedFilename($method, $suffix,
			$extension);

		$this->assertCreateFileDirectoryPath($derived,
			'Stream test file');

		$content = 'This is just a test.' . PHP_EOL;

		$manager = StreamManager::getInstance();
		$stream = $manager->createFileStream($derived, 'w');
		$this->assertInstanceOf(StreamInterface::class, $stream,
			'Create stream using StreamManager');
		$stream->write($content);
		$stream->close();

		$this->assertDerivedFileEqualsReferenceFile($method, $suffix,
			$extension, 'Content written using StreamInterface');
		$stream = $manager->createFileStream($derived, 'r');
		$resource = $manager->getStreamResource($stream);

		$this->assertTrue(\is_resource($resource),
			'Resource from stream');
		$this->assertEquals('stream', \get_resource_type($resource),
			'Resource type');

		$meta = \stream_get_meta_data($resource);
		$this->assertEquals(StreamWrapper::WRAPPER_URI, $meta['uri'],
			'Wrapper URI');

		$derivedContent = \fread($resource, 1024);
		$this->assertDerivedFile($derivedContent, $method, $suffix,
			$extension, 'Read content using PHP native stream API');

		\fclose($resource);
		$stream->close();
	}

	public function testManager()
	{
		$uri = 'php://memory';
		$resource = \fopen($uri, 'r');
		$stream = new Stream($resource);
		$manager = StreamManager::getInstance();

		foreach ([
			$uri,
			$resource,
			$stream
		] as $input)
		{
			$actual = $manager->create($input);
			$this->assertInstanceOf(StreamInterface::class, $actual,
				'Stream from ' . TypeDescription::getName($input));
		}
	}
}