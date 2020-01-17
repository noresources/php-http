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

interface AlternativeValueListInterface extends \Countable, \IteratorAggregate

{

	/**
	 *
	 * @param integer $index
	 *        	Alternative index
	 * @return HeaderValueInterface
	 */
	function getAlternative($index);
}