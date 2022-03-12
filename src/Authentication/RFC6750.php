<?php

/**
 * Copyright © 2022 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Authentication;

use NoreSources\Http\RFC7235;

/**
 *
 * @see https://datatracker.ietf.org/doc/html/rfc6750
 */
class RFC6750
{

	/**
	 * b64token is the former name of token68.
	 * The name was changed to avoid ambiguity with Base64 strings.
	 *
	 * @var string
	 */
	const B64TOKEN_PATTERN = RFC7235::TOKEN68_PATTERN;
}
