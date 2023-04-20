<?php
/**
 * Copyright © 2012 - 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Authentication;

use NoreSources\Http\RFC7230;
use NoreSources\Http\RFC7235;
use NoreSources\Http\Header\InvalidHeaderException;

/**
 * Create CredentialDataInterface concrete class instance
 * according Authentication scheme
 *
 * @see https://datatracker.ietf.org/doc/html/rfc2616#section-14.8
 */
class CredentialDataFactory
{

	/**
	 *
	 * @param string $scheme
	 *        	Authentication scheme
	 * @param string $stringData
	 *        	Credential data text string
	 * @throws InvalidHeaderException
	 * @return CredentialDataInterface
	 */
	public static function createFromString($scheme, $stringData)
	{
		$token64Pattern = chr(1) . '^(' . RFC7235::TOKEN68_PATTERN . ')' .
			RFC7230::OWS_PATTERN . '$' . chr(1);
		$matches = [];
		if (\strcasecmp($scheme, AuthenticationScheme::BASIC) == 0 &&
			\preg_match($token64Pattern, $stringData, $match))
		{
			/**
			 *
			 * @see https://datatracker.ietf.org/doc/html/rfc2617#section-2
			 */
			return new BasicCredentialData($match[1]);
		}
		elseif (\strcasecmp($scheme, AuthenticationScheme::BEARER) == 0 &&
			\preg_match($token64Pattern, $stringData, $match))
		{
			/**
			 *
			 * @see https://datatracker.ietf.org/doc/html/rfc6750#section-2.1
			 */
			return new TokenCredentialData($match[1]);
		}
		elseif (\preg_match($token64Pattern, $stringData, $match))
			return new TokenCredentialData($match[1]);
		elseif (\preg_match(
			chr(1) . '^(' . RFC7235::AUTH_PARAM_LIST_PATTERN . ')' .
			RFC7230::OWS_PATTERN . '$' . chr(1), $stringData, $match))
		{
			return new ParameterMapCredentialData($match[1]);
		}

		throw new InvalidHeaderException(
			'Invalid credential data for ' . $scheme . ' scheme',
			InvalidHeaderException::INVALID_HEADER_VALUE);
	}
}