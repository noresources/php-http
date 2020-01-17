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

use NoreSources\StringRepresentation;

/**
 * RFC 1341 MIME (Multipurpose Internet Mail Extensions):
 *
 * @see https://www.w3.org/Protocols/rfc1341/7_2_Multipart.html
 *
 */
class MultipartBoundary implements StringRepresentation
{

	/**
	 *
	 * @param string $value
	 */
	public function __construct($value)
	{
		$this->boundary = $value;
	}

	public function getBoundaryString()
	{
		return $this->boundary;
	}

	public function getBoundaryLine()
	{
		return chr(45) . chr(45) . $this->getBoundaryString();
	}

	/**
	 *
	 * {@inheritdoc}
	 * @return string Boundary value
	 */
	public function __toString()
	{
		return $this->getBoundaryString()
	}

	/**
	 * Compliant boundary value
	 *
	 * @var string
	 */
	private $boundary;
}