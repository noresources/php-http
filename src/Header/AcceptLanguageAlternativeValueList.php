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

use NoreSources\Container;
use NoreSources\MediaType\MediaRange;

class AcceptLanguageAlternativeValueList implements AlternativeValueListInterface
{
	use AlternativeValueListTrait;

	public function __construct($alternatives)
	{
		$this->setAlternatives($alternatives);
	}
}