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

use NoreSources\Http\Header\HeaderValueFactory;
use NoreSources\Http\Header\HeaderValueInterface;
use NoreSources\Http\Header\InvalidHeaderException;

final class HeaderValueFactoryTest extends \PHPUnit\Framework\TestCase
{

	public function testFactory()
	{
		$tests = [
			'generic' => [
				'line' => 'Foo: bar',
				'name' => 'foo',
				'value' => 'bar',
				'error' => 0
			],
			'invalid generic' => [
				'line' => 'Foo bar',
				'name' => null,
				'value' => null,
				'error' => InvalidHeaderException::INVALID_HEADER_LINE
			],
			'content-type' => [
				'line' => 'Content-Type:  text/html',
				'name' => 'content-type',
				'value' => 'text/html',
				'error' => 0
			],
			'content-type with invalid media type' => [
				'line' => 'Content-Type:  te+xt/html',
				'name' => null,
				'value' => null,
				'error' => InvalidHeaderException::INVALID_HEADER_VALUE
			]
		];

		foreach ($tests as $label => $test)
		{
			$test = (object) $test;
			$error = 0;
			$name = null;
			$value = null;
			try
			{
				list ($name, $value) = HeaderValueFactory::fromHeaderLine($test->line, true);
			}
			catch (InvalidHeaderException $e)
			{
				$error = $e->getCode();
			}

			if ($test->error !== 0)
			{
				$this->assertEquals($test->error, $error, $label . ' error code');
				continue;
			}

			$this->assertEquals($test->name, \strtolower($name), $label . ' name');
			$this->assertInstanceOf(HeaderValueInterface::class, $value,
				$label . ' value is a ' . HeaderValueInterface::class);
			$this->assertEquals($test->value, \strval($value->getValue()), $label . ' value');
		}
	}
}
