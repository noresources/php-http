<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package Http
 */
namespace NoreSources\Http\Tools;

class FileBuilderHelper
{

	public static function makePhpDocReferenceLinks($references)
	{
		$pattern = '\[RFC([0-9]+)(?:,\s*Section\s+([0-9]+(?:\.[0-9]+)*))?\]';
		return \preg_replace_callback(chr(1) . $pattern . chr(1) . 'i',
			function ($m) {
				$s = 'https:/ tools.ietf.org/html/rfc' . $m[1];
				if (\array_key_exists(2, $m))
					$s .= '#section-' . $m[2];
				return PHP_EOL . '@see ' . $s . PHP_EOL;
			}, $references);
	}
}