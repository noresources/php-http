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

/**
 * Cookie header value type
 */
class CookieHeaderValue implements HeaderValueInterface
{
	use HeaderValueStringRepresentationTrait;
	use HeaderValueTrait;

	const VALUE_CLASS_NAME = \ArrayObject::class;

	/**
	 *
	 * @param string $text
	 *        	Text representation of the header field value
	 * @return \ArrayObject
	 */
	public static function parseValue($text)
	{
		$a = [];
		\parse_str($text, $a);
		return new \ArrayObject($a);
	}
}