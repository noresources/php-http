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

use NoreSources\Logger\AbstractTcpLogger;

class BasicTcpLogger extends AbstractTcpLogger
{

	public $prefix = '';

	public function formatMessage($level, $message, array $context = [])
	{
		if (\strlen($this->prefix))
			$message = \preg_replace('/^(.*)/m', $this->prefix . "\\1", $message);
		return $message;
	}
}