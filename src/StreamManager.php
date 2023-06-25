<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http;

use NoreSources\SingletonTrait;
use Psr\Http\Message\StreamInterface;

class StreamManager
{
	use SingletonTrait;

	/**
	 *
	 * @param unknown $filename
	 *        	File path
	 * @param unknown $mode
	 *        	File mode flags
	 * @throws \RuntimeException
	 * @return StreamInterface
	 */
	public function createFileStream($filename, $mode)
	{
		$file = @\fopen($filename, $mode);
		if ($file === false)
		{
			$error = \error_get_last();
			throw new \RuntimeException($error['message']);
		}

		return new Stream($file);
	}

	/**
	 *
	 * @param StreamInterface $stream
	 *        	PSR-7 Stream
	 * @return resource
	 */
	public function getStreamResource(StreamInterface $stream)
	{
		if (!\in_array(StreamWrapper::WRAPPER_SCHEME,
			\stream_get_wrappers()))
		{
			\stream_register_wrapper(StreamWrapper::WRAPPER_SCHEME,
				StreamWrapper::class);
		}

		$r = $stream->isReadable();
		$w = $stream->isWritable();
		if (!($r || $w))
			throw new \InvalidArgumentException(
				'Stream is not readable nor writable');

		$mode = ($r ? ($w ? 'r+' : 'r') : 'w');
		$context = \stream_context_create(
			[
				StreamWrapper::class => [
					'stream' => $stream
				]
			]);
		return \fopen(StreamWrapper::WRAPPER_URI, $mode, false, $context);
	}
}
