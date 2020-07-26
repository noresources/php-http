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

use NoreSources\IntegerRepresentation;
use NoreSources\TypeConversion;

class IntegerHeaderValue implements HeaderValueInterface, IntegerRepresentation
{

	/**
	 *
	 * @param mixed $value
	 */
	public function __construct($value)
	{
		$this->integerValue = TypeConversion::toInteger($text);
	}

	public function __toString()
	{
		return \strval($this->integerValue);
	}

	public function getIntegerValue()
	{
		return $this->integerValue;
	}

	/**
	 *
	 * @param string $text
	 * @return \NoreSources\Http\Header\IntegerHeaderValue
	 */
	public static function fromString($text)
	{
		return new IntegerHeaderValue($text);
	}

	/**
	 *
	 * @var integer
	 */
	private $integerValue;
}