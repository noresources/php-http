<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http;

use NoreSources\SingletonTrait;
use NoreSources\Type\TypeDescription;
use Psr\Http\Message\StreamInterface;

class StreamManager
{
	use SingletonTrait;

	/**
	 *
	 * Create a StreamInterface from any supported kind of input.
	 *
	 * @param mixed $input
	 *        	Anything that can be a internal resource for a Stream.
	 * @param string $mode
	 *        	Stream open mode (for string input)
	 * @throws \InvalidArgumentException
	 * @return StreamInterface
	 */
	public function create($input, $mode = 'r')
	{
		if (\is_string($input))
			return $this->createFileStream($input, $mode);

		if (\is_resource($input))
			return $this->createFromResource($input);

		if ($input instanceof StreamInterface)
			return $input;

		throw new \InvalidArgumentException(
			TypeDescription::getName($input) . ' type is not supported');
	}

	/**
	 * Create StreamInterface object from stream resource
	 *
	 * @param resource $resource
	 *        	Stream resource
	 * @throws \InvalidArgumentException
	 * @return StreamInterface
	 */
	public function createFromResource($resource)
	{
		if (!\is_resource($resource))
			throw new \InvalidArgumentException('resource expected');
		$type = \get_resource_type($resource);
		switch ($type)
		{
			case 'stream':
				return new Stream($resource);
		}
		throw new \InvalidArgumentException(
			$type . ' resource type is not supported');
	}

	/**
	 * Create a StreamInterface object from any stream URI or file path
	 *
	 * @param string $filename
	 *        	File path or stream URI
	 * @param string $mode
	 *        	File mode flags
	 * @throws \RuntimeException
	 * @return StreamInterface
	 */
	public function createFileStream($filename, $mode = 'r')
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
