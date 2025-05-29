<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http;


/**
 * Wraps PSR-7 Stream to a regular PHP stream resource
 * using the PHP streamWriter protocol
 *
 * Largely inspired by the Guzzle StreamWrapper class.
 *
 * @see https://www.php.net/manual/en/class.streamwrapper.php
 * @see https://raw.githubusercontent.com/guzzle/psr7/2.6/src/StreamWrapper.php
 *
 */
class StreamWrapper
{

	/**
	 *
	 * @var resource
	 */
	public $context;

	const WRAPPER_SCHEME = 'ns-php-http-psr7';

	const WRAPPER_URI = self::WRAPPER_SCHEME . '://stream';

	public function __construct()
	{
		$this->mode = '';
		$this->stream = null;
	}

	/**
	 *
	 * @param string $path
	 * @param string $mode
	 *        	Open mode flags
	 * @param int $options
	 * @param string $unused_opened_path
	 * @return bool
	 */
	public function stream_open(string $path, string $mode, int $options,
		?string &$unused_opened_path = null): bool

{
	$options = stream_context_get_options($this->context);

	if (!isset($options[static::class]['stream']))
		return false;

	$this->mode = $mode;
	$this->stream = $options[static::class]['stream'];
	return true;
}

	/**
	 *
	 * @param int $count
	 *        	Numberytes to read
	 * @return string Read data
	 */
	public function stream_read(int $count): string
	{
		return $this->stream->read($count);
	}

	/**
	 *
	 * @param string $data
	 *        	Bytes to write
	 * @return int Number of bytes written
	 */
	public function stream_write(string $data): int
	{
		return $this->stream->write($data);
	}

	/**
	 *
	 * @return int Stream cursor position
	 */
	public function stream_tell(): int
	{
		return $this->stream->tell();
	}

	/**
	 *
	 * @return bool TRUE if stream cursor is at end of stream
	 */
	public function stream_eof(): bool
	{
		return $this->stream->eof();
	}

	/**
	 *
	 * @param int $offset
	 *        	Movement offset
	 * @param int $whence
	 *        	Movement starting point
	 * @return bool
	 */
	public function stream_seek(int $offset, int $whence): bool
	{
		$this->stream->seek($offset, $whence);

		return true;
	}

	/**
	 *
	 * @param int $cast_as
	 * @return boolean|resource|false
	 */
	public function stream_cast(int $cast_as)
	{
		$stream = clone ($this->stream);
		$resource = $stream->detach();

		if ($resource === null)
			return false;
		return $resource;
	}

	/**
	 *
	 * @return array<int|string, int>
	 */
	public function stream_stat(): array
	{
		static $modeMap = [
			'r' => 33060,
			'rb' => 33060,
			'r+' => 33206,
			'w' => 33188,
			'wb' => 33188
		];

		return [
			'dev' => 0,
			'ino' => 0,
			'mode' => $modeMap[$this->mode],
			'nlink' => 0,
			'uid' => 0,
			'gid' => 0,
			'rdev' => 0,
			'size' => $this->stream->getSize() ?: 0,
			'atime' => 0,
			'mtime' => 0,
			'ctime' => 0,
			'blksize' => 0,
			'blocks' => 0
		];
	}

	/**
	 *
	 * @return array<int|string, int>
	 */
	/**
	 *
	 * @param string $path
	 * @param int $flags
	 * @return array
	 */
	public function url_stat(string $path, int $flags): array
	{
		return [
			'dev' => 0,
			'ino' => 0,
			'mode' => 0,
			'nlink' => 0,
			'uid' => 0,
			'gid' => 0,
			'rdev' => 0,
			'size' => 0,
			'atime' => 0,
			'mtime' => 0,
			'ctime' => 0,
			'blksize' => 0,
			'blocks' => 0
		];
	}

	/**
	 *
	 * @var StreamInterface
	 */
	private $stream;

	/**
	 *
	 * @var string
	 */
	private $mode;
}
