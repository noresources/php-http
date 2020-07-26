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

use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LogLevel;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class RequestDumper implements LoggerAwareInterface
{
	use LoggerAwareTrait;

	const RESOURCE = 0x01;

	const HEADER = 0x02;

	const BASIC = self::RESOURCE | self::HEADER;

	const BODY = 0x04;

	const FULL = self::BASIC | self::BODY;

	public function dump(ServerRequestInterface $request, $parts = self::BASIC)
	{
		$s = '';
		if ($parts & self::RESOURCE)
			$s .= $request->getMethod() . ' ' . $request->getUri() . PHP_EOL;
		if ($parts & self::HEADER)
		{
			foreach ($request->getHeaders() as $name => $value)
			{
				$s .= $name . ': ' . implode("\n\t", $value) . PHP_EOL;
			}

			$s .= PHP_EOL;
		}
		if ($parts & self::BODY)
		{
			$s .= \strval($request->getBody()) . PHP_EOL;
		}

		$this->logger->log(LogLevel::DEBUG, $s);
	}
}