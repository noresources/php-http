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

final class ContentTypeTest extends \PHPUnit\Framework\TestCase
{

	public function testParse()
	{
		$tests = [
			'Basic' => [
				'string' => 'text/plain',
				'mediaType' => 'text/plain',
				'charset' => null,
				'boundary' => null,
				'valid' => true
			],
			'with charset' => [
				'string' => 'text/html; charset=utf-8',
				'mediaType' => 'text/html',
				'charset' => 'utf-8',
				'boundary' => null,
				'valid' => true
			]
		];

		foreach ($tests as $label => $test)
		{
			$test = (object) $test;
			$valid = false;
			try
			{
				$contentType = HeaderValueFactory::fromKeyValue('content-type', $test->string);
				$valid = true;
			}
			catch (\Exception $e)
			{
				if ($test->valid)
					throw $e;
				continue;
			}

			$this->assertEquals($test->valid, $valid,
				$label . ' is ' . ($test->valid ? '' : 'not ') . 'valid');

			$this->assertEquals($test->mediaType, strval($contentType->getValue()));
			$this->assertEquals($test->charset,
				$contentType->getValue()
					->getParameters()['charset'], $label . ' charset');
			$this->assertEquals($test->boundary,
				strval($contentType->getValue()
					->getParameters()['boundary']), $label . ' boundary');
		}
	}
}
