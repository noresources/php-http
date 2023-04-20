<?php
/**
 * Copyright © 2012 - 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Header;

use NoreSources\Http\Header\Traits\AlternativeValueListTrait;

class AcceptLanguageAlternativeValueList implements
	AlternativeValueListInterface
{
	use AlternativeValueListTrait;
}