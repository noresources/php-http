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

use NoreSources\Type\TypeConversion;

class FileBuilderHelper
{

	public static function makePhpDocReferenceLinks($references)
	{
		$base = 'https://tools.ietf.org/html/rfc';
		$pattern = '\[RFC([0-9]+)(?:,\s*Section\s+([0-9]+(?:\.[0-9]+)*))?\]';
		$references = \preg_replace_callback(
			chr(1) . $pattern . chr(1) . 'i',
			function ($m) use ($base) {
				$s = $base . $m[1];
				if (\array_key_exists(2, $m))
					$s .= '#section-' . $m[2];
				return PHP_EOL . '@see ' . $s . PHP_EOL;
			}, $references);
		$pattern = '\[RFC([0-9]+)[:,]\s*(.*)\]';
		return \preg_replace(chr(1) . $pattern . chr(1),
			'@see ' . $base . '$1 $2' . PHP_EOL, $references);
		return $references;
	}

	public static function download($url, $filename)
	{
		if (!\extension_loaded('curl'))
		{
			\trigger_error('cURL extension not available.');
			return false;
		}

		$tmp = $filename . '.download';
		$file = fopen($tmp, 'w');
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_FILE, $file);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_USERAGENT,
			"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
		$result = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		fclose($file);
		if (!($result && $status == 200))
		{
			unlink($tmp);
			\trigger_error(
				'Failed to download resource file (result: ' .
				TypeConversion::toString($result) . ', status: ' .
				$status . ')');
			return false;
		}
		rename($tmp, $filename);
		return true;
	}
}