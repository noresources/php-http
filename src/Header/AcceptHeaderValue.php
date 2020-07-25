<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package Http
 */
namespace NoreSources\Http\Header;

use NoreSources\Http\ParameterMapProviderInterface;
use NoreSources\Http\ParameterMapProviderTrait;
use NoreSources\Http\QualityValueInterface;
use NoreSources\Http\QualityValueTrait;
use NoreSources\MediaType\MediaRange;

class AcceptHeaderValue implements HeaderValueInterface, ParameterMapProviderInterface,
	QualityValueInterface
{
	use QualityValueTrait;
	use HeaderValueTrait;
	use HeaderValueStringRepresentationTrait;
	use ParameterMapProviderTrait;

	/**
	 *
	 * @param unknown $text
	 * @return \NoreSources\MediaType\MediaRange
	 */
	public static function parseValue($text)
	{
		return MediaRange::fromString($text, false);
	}
}