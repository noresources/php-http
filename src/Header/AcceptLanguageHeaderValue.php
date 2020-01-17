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

use NoreSources\Http\QualityValueInterface;
use NoreSources\Http\QualityValueTrait;
use NoreSources\MediaType\MediaRange;
use NoreSources\KeyValueParameterMapInterface;

class AcceptLanguageHeaderValue implements HeaderValueInterface, QualityValueInterface
{
	use QualityValueTrait;
	use HeaderValueStringRepresentationTrait;
	use HeaderValueTrait;
}