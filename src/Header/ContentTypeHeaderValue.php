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

use NoreSources\MediaType\MediaType;
use NoreSources\MediaType\MediaTypeInterface;

/**
 * Content-Type header value
 *
 * @see https://tools.ietf.org/html/rfc7231#section-3.1.1.5
 *
 */
class ContentTypeHeaderValue implements HeaderValueInterface
{
	use HeaderValueStringRepresentationTrait;
	use HeaderValueTrait;

	const VALUE_CLASS_NAME = MediaType::class;

	/**
	 *
	 * @param string $text
	 * @return MediaTypeInterface
	 */
	public static function parseValue($text)
	{
		return MediaType::fromString($text, true);
	}
}