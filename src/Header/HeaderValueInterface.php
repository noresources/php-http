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

use NoreSources\StringRepresentation;

/**
 * Header field value
 */
interface HeaderValueInterface extends StringRepresentation
{

	/**
	 *
	 * @return mixed The header value main object
	 */
	function getValue();
}