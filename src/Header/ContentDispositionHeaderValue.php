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

class ContentDispositionHeaderValue implements HeaderValueInterface, ParameterMapProviderInterface
{
	use HeaderValueStringRepresentationTrait;
	use HeaderValueTrait;
	use ParameterMapProviderTrait;
}