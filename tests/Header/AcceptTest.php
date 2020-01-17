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

use NoreSources\Http\Header\AcceptAlternativeValueList;
use NoreSources\Http\Header\HeaderValueFactory;

final class AcceptTest extends \PHPUnit\Framework\TestCase
{

	public function testParse()
	{
		$tests = [
			'Basic' => [
				'string' => 'text/plain',
				'alternatives' => [
					[
						'mediaRange' => 'text/plain',
						'quality' => 1.0,
						'parameters' => [],
						'extensions' => []
					]
				],
				'valid' => true
			],
			'with charset' => [
				'string' => 'text/html; charset=utf-8',
				'alternatives' => [
					[
						'mediaRange' => 'text/html',
						'quality' => 1.0,
						'parameters' => [
							'charset' => 'utf-8'
						],
						'extensions' => []
					]
				],
				'valid' => true
			],
			'with param and quality' => [
				'string' => 'text/html; p=Pee;foo="Bar"; q=0.2',
				'alternatives' => [
					[
						'mediaRange' => 'text/html',
						'quality' => 0.2,
						'parameters' => [
							'p' => 'Pee',
							'foo' => 'Bar'
						],
						'extensions' => []
					]
				],
				'valid' => true
			],
			'Basic list' => [
				'string' => 'text/plain , text/html',
				'alternatives' => [
					[
						'mediaRange' => 'text/plain',
						'quality' => 1.0,
						'parameters' => [],
						'extensions' => []
					],
					[
						'mediaRange' => 'text/html',
						'quality' => 1.0,
						'parameters' => [],
						'extensions' => []
					]
				],
				'valid' => true
			]
		];

		foreach ($tests as $label => $test)
		{
			$test = (object) $test;
			$valid = false;
			try
			{
				$accept = HeaderValueFactory::fromKeyValue('accept', $test->string);
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

			$this->assertInstanceOf(AcceptAlternativeValueList::class, $accept,
				$label . ', class type');
			$this->assertInstanceOf(\Countable::class, $accept);

			$this->assertCount(\count($test->alternatives), $accept, $label . ', alternative count');

			foreach ($test->alternatives as $index => $alternative)
			{
				$expected = (object) $alternative;
				$actual = $accept->getAlternative($index);
				$lbl = $label . ' alternative [' . $index . ']';

				$this->assertEquals($expected->mediaRange, strval($actual->getValue()),
					$lbl . ' media range');

				$this->assertEquals($expected->quality, $actual->getQualityValue(),
					$lbl . ' quality value');

				$this->assertCount(\count($expected->parameters),
					$actual->getValue()
						->getParameters(), $lbl . ' media range parameter count');

				foreach ($expected->parameters as $k => $v)
				{
					$this->assertEquals($v, $actual->getValue()
						->getParameters()[$k], $lbl . ' parameter ' . $k . ' value');
				}

				$this->assertCount(\count($expected->extensions), $actual->getParameters(),
					$lbl . ' extensions count');

				foreach ($expected->extensions as $k => $v)
				{
					$this->assertArrayHasKey($k, $actual->getParameters(),
						$lbl . ' extension ' . $k . ' presence');

					if ($actual->getParameters()->offsetExists($k))
						$this->assertEquals($v, $actual->getParameters()
							->offsetGet($k), $lbl . ' extension ' . $k . ' value');
				}
			}
		}
	}
}
