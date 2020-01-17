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

/**
 * RFC 7231 Accept header value
 *
 * @see https://tools.ietf.org/html/rfc7231#section-5.3.2
 *
 */
class AcceptAlternativeValueList implements AlternativeValueListInterface
{

	use AlternativeValueListTrait;

	public function __construct($alternatives = array())
	{
		$this->setAlternatives($alternatives);
	}
}