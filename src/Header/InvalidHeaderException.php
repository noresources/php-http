<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package HTTP
 */
namespace NoreSources\Http\Header;

/**
 * Exception raised when a headre line content is not valid
 */
class InvalidHeaderException extends \ErrorException
{

	const INVALID_HEADER_NAME = 1;

	const INVALID_HEADER_VALUE = 2;

	const INVALID_HEADER_LINE = 3;

	/**
	 *
	 * @param string $text
	 *        	Header line, name or value
	 * @param integer $code
	 *        	[1-3] Header component which is not valid
	 *        	Error code
	 */
	public function __construct($text, $code)
	{
		$genericTexts = [
			self::INVALID_HEADER_LINE => 'Invalid header line format',
			self::INVALID_HEADER_NAME => 'Invalid header name',
			self::INVALID_HEADER_VALUE => 'Invalid header value'
		];

		if (\array_key_exists($code, $genericTexts))
			$text = $genericTexts[$code] . ': ' . $text;

		parent::__construct($text, $code);
	}
}