<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package HTTP
 */
namespace NoreSources\Http;

use NoreSources\Http\Header\HeaderField;
use NoreSources\Http\Header\HeaderValueFactory;

final class ContentTypeNegociationtTest extends \PHPUnit\Framework\TestCase
{

	public function testA()
	{
		$tests = [
			'rfc7230-example' => [
				'accept' => 'text/*;q=0.3, text/html;q=0.7, ' .
				' text/html;level=1, text/html;level=2;q=0.4, */*;q=0.5',
				'mediaTypes' => [
					'text/html;level=1' => 1,
					'text/html' => 0.7,
					'text/plain' => 0.3,
					'image/jpeg' => 0.5,
					'text/html;level=2' => 0.4,
					'text/html;level=3' => 0.7
				]
			]
		];

		foreach ($tests as $label => $test)
		{
			$test = (object) $test;
			$accept = HeaderValueFactory::fromKeyValue(HeaderField::ACCEPT, $test->accept);
			foreach ($test->mediaTypes as $mediaTypeString => $expectedQualityValue)
			{
				$contentType = HeaderValueFactory::fromKeyValue(HeaderField::CONTENT_TYPE,
					$mediaTypeString);
				$qualityValue = ContentTypeNegociation::getContentTypeQualityValue(
					$contentType->getMediaType(), $accept);

				$this->assertEquals($expectedQualityValue, $qualityValue,
					$label . ' vs ' . $mediaTypeString);
			}
		}
	}
}