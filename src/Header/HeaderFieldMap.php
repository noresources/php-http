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

use NoreSources\ArrayRepresentation;
use NoreSources\CaseInsensitiveKeyMapTrait;
use Psr\Container\ContainerInterface;

class HeaderFieldMap implements \ArrayAccess, ArrayRepresentation,
	ContainerInterface, \Countable, \IteratorAggregate
{
	use CaseInsensitiveKeyMapTrait;
}
