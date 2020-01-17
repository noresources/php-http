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

use Laminas\Diactoros\Stream;
use NoreSources\Http\Header\MessageHeaderParser;

class MessageHeaderParserTest extends \PHPUnit\Framework\TestCase
{

	public final function testParse()
	{
		$filename = __DIR__ . '/../data/header.1.crlf';
		$this->assertFileExists($filename);

		$stream = new Stream(\fopen($filename, 'r'));
		$this->assertFalse($stream->eof());

		$parser = new MessageHeaderParser();
		$headers = $parser->parse($stream);

		$this->assertCount(2, $headers, 'Header field count');

		$expected = [
			'Content-Type' => 'text/plain',
			'Content-Length' => 8
		];

		$this->assertEquals($expected, $headers, 'Header fields');

		$this->assertEquals('abcdefgh', $stream->getContents());
	}
}