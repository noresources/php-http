<?php

/**
 * Copyright © 2025 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 *          This file is generated by tools/build-constant-files.php
 *          from https://www.iana.org/assignments/http-authschemes/authschemes.csv
 */
namespace NoreSources\Http\Authentication;

/**
 * Hypertext Transfer Protocol (HTTP) Authentication Scheme
 */
class AuthenticationScheme
{

	/**
	 * Basic authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7617
	 */
	const BASIC = 'Basic';

	/**
	 * Bearer authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6750
	 */
	const BEARER = 'Bearer';

	/**
	 * Concealed authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9729
	 */
	const CONCEALED = 'Concealed';

	/**
	 * Digest authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7616
	 */
	const DIGEST = 'Digest';

	/**
	 * DPoP authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9449#section-7.1
	 */
	const D_PO_P = 'DPoP';

	/**
	 * GNAP authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9635#section-7.2
	 */
	const GNAP = 'GNAP';

	/**
	 * HOBA authentication scheme
	 * The HOBA scheme can be used with either HTTP
	 * servers or proxies.
	 * When used in response to a 407 Proxy
	 * Authentication Required indication, the appropriate proxy
	 * authentication header fields are used instead, as with any other HTTP
	 * authentication scheme.
	 *
	 * @see https://tools.ietf.org/html/rfc7486#section-3
	 */
	const HOBA = 'HOBA';

	/**
	 * Mutual authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8120
	 */
	const MUTUAL = 'Mutual';

	/**
	 * Negotiate authentication scheme
	 * This authentication scheme violates both HTTP semantics (being connection-oriented) and
	 * syntax (use of syntax incompatible with the WWW-Authenticate and Authorization header field
	 * syntax).
	 *
	 * @see https://tools.ietf.org/html/rfc4559#section-3
	 */
	const NEGOTIATE = 'Negotiate';

	/**
	 * OAuth authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc5849#section-3.5.1
	 */
	const O_AUTH = 'OAuth';

	/**
	 * PrivateToken authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9577#section-2
	 */
	const PRIVATE_TOKEN = 'PrivateToken';

	/**
	 * SCRAM-SHA-1 authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7804
	 */
	const SCRAM_SHA_1 = 'SCRAM-SHA-1';

	/**
	 * SCRAM-SHA-256 authentication scheme
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7804
	 */
	const SCRAM_SHA_256 = 'SCRAM-SHA-256';

	/**
	 * vapid authentication scheme
	 *
	 * [RFC 8292, Section 3]
	 */
	const VAPID = 'vapid';
}
