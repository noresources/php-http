<?php

/**
 * Copyright © 2024 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 *          This file is generated by tools/build-constant-files.php
 *          from https://www.iana.org/assignments/http-status-codes/http-status-codes-1.csv
 */
namespace NoreSources\Http;

use NoreSources\Container\Container;

/**
 * HTTP status codes.
 * From the Hypertext Transfer Protocol (HTTP) Status Code Registry
 *
 * @see https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
 */
class Status
{

	/**
	 * Continue HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.2.1
	 */
	const CONTINUE = 100;

	/**
	 * Switching Protocols HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.2.2
	 */
	const SWITCHING_PROTOCOLS = 101;

	/**
	 * Processing HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc2518
	 */
	const PROCESSING = 102;

	/**
	 * Early Hints HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8297
	 */
	const EARLY_HINTS = 103;

	/**
	 * Unassigned HTTP status code
	 */
	const UNASSIGNED = 512;

	/**
	 * OK HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.1
	 */
	const OK = 200;

	/**
	 * Created HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.2
	 */
	const CREATED = 201;

	/**
	 * Accepted HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.3
	 */
	const ACCEPTED = 202;

	/**
	 * Non-Authoritative Information HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.4
	 */
	const NON_AUTHORITATIVE_INFORMATION = 203;

	/**
	 * No Content HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.5
	 */
	const NO_CONTENT = 204;

	/**
	 * Reset Content HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.6
	 */
	const RESET_CONTENT = 205;

	/**
	 * Partial Content HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.3.7
	 */
	const PARTIAL_CONTENT = 206;

	/**
	 * Multi-Status HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const MULTI_STATUS = 207;

	/**
	 * Already Reported HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc5842
	 */
	const ALREADY_REPORTED = 208;

	/**
	 * IM Used HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc3229
	 */
	const IM_USED = 226;

	/**
	 * Multiple Choices HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.1
	 */
	const MULTIPLE_CHOICES = 300;

	/**
	 * Moved Permanently HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.2
	 */
	const MOVED_PERMANENTLY = 301;

	/**
	 * Found HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.3
	 */
	const FOUND = 302;

	/**
	 * See Other HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.4
	 */
	const SEE_OTHER = 303;

	/**
	 * Not Modified HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.5
	 */
	const NOT_MODIFIED = 304;

	/**
	 * Use Proxy HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.6
	 */
	const USE_PROXY = 305;

	/**
	 * (Unused) HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.19
	 */
	const _UNUSED_ = 418;

	/**
	 * Temporary Redirect HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.8
	 */
	const TEMPORARY_REDIRECT = 307;

	/**
	 * Permanent Redirect HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.4.9
	 */
	const PERMANENT_REDIRECT = 308;

	/**
	 * Bad Request HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.1
	 */
	const BAD_REQUEST = 400;

	/**
	 * Unauthorized HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.2
	 */
	const UNAUTHORIZED = 401;

	/**
	 * Payment Required HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.3
	 */
	const PAYMENT_REQUIRED = 402;

	/**
	 * Forbidden HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.4
	 */
	const FORBIDDEN = 403;

	/**
	 * Not Found HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.5
	 */
	const NOT_FOUND = 404;

	/**
	 * Method Not Allowed HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.6
	 */
	const METHOD_NOT_ALLOWED = 405;

	/**
	 * Not Acceptable HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.7
	 */
	const NOT_ACCEPTABLE = 406;

	/**
	 * Proxy Authentication Required HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.8
	 */
	const PROXY_AUTHENTICATION_REQUIRED = 407;

	/**
	 * Request Timeout HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.9
	 */
	const REQUEST_TIMEOUT = 408;

	/**
	 * Conflict HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.10
	 */
	const CONFLICT = 409;

	/**
	 * Gone HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.11
	 */
	const GONE = 410;

	/**
	 * Length Required HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.12
	 */
	const LENGTH_REQUIRED = 411;

	/**
	 * Precondition Failed HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.13
	 */
	const PRECONDITION_FAILED = 412;

	/**
	 * Content Too Large HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.14
	 */
	const CONTENT_TOO_LARGE = 413;

	/**
	 * URI Too Long HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.15
	 */
	const URI_TOO_LONG = 414;

	/**
	 * Unsupported Media Type HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.16
	 */
	const UNSUPPORTED_MEDIA_TYPE = 415;

	/**
	 * Range Not Satisfiable HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.17
	 */
	const RANGE_NOT_SATISFIABLE = 416;

	/**
	 * Expectation Failed HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.18
	 */
	const EXPECTATION_FAILED = 417;

	/**
	 * Misdirected Request HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.20
	 */
	const MISDIRECTED_REQUEST = 421;

	/**
	 * Unprocessable Content HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.21
	 */
	const UNPROCESSABLE_CONTENT = 422;

	/**
	 * Locked HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const LOCKED = 423;

	/**
	 * Failed Dependency HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const FAILED_DEPENDENCY = 424;

	/**
	 * Too Early HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8470
	 */
	const TOO_EARLY = 425;

	/**
	 * Upgrade Required HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.5.22
	 */
	const UPGRADE_REQUIRED = 426;

	/**
	 * Precondition Required HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6585
	 */
	const PRECONDITION_REQUIRED = 428;

	/**
	 * Too Many Requests HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6585
	 */
	const TOO_MANY_REQUESTS = 429;

	/**
	 * Request Header Fields Too Large HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6585
	 */
	const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;

	/**
	 * Unavailable For Legal Reasons HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7725
	 */
	const UNAVAILABLE_FOR_LEGAL_REASONS = 451;

	/**
	 * Internal Server Error HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.6.1
	 */
	const INTERNAL_SERVER_ERROR = 500;

	/**
	 * Not Implemented HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.6.2
	 */
	const NOT_IMPLEMENTED = 501;

	/**
	 * Bad Gateway HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.6.3
	 */
	const BAD_GATEWAY = 502;

	/**
	 * Service Unavailable HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.6.4
	 */
	const SERVICE_UNAVAILABLE = 503;

	/**
	 * Gateway Timeout HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.6.5
	 */
	const GATEWAY_TIMEOUT = 504;

	/**
	 * HTTP Version Not Supported HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc9110#section-15.6.6
	 */
	const HTTP_VERSION_NOT_SUPPORTED = 505;

	/**
	 * Variant Also Negotiates HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc2295
	 */
	const VARIANT_ALSO_NEGOTIATES = 506;

	/**
	 * Insufficient Storage HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const INSUFFICIENT_STORAGE = 507;

	/**
	 * Loop Detected HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc5842
	 */
	const LOOP_DETECTED = 508;

	/**
	 * Not Extended (OBSOLETED) HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc2774 [Status change of HTTP experiments to Historic]
	 */
	const NOT_EXTENDED__OBSOLETED_ = 510;

	/**
	 * Network Authentication Required HTTP status code
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6585
	 */
	const NETWORK_AUTHENTICATION_REQUIRED = 511;

	public static function getStatusText($key)
	{
		static $map = [
			100 => 'Continue',
			101 => 'Switching Protocols',
			102 => 'Processing',
			103 => 'Early Hints',
			104 => 'Unassigned',
			200 => 'OK',
			201 => 'Created',
			202 => 'Accepted',
			203 => 'Non-Authoritative Information',
			204 => 'No Content',
			205 => 'Reset Content',
			206 => 'Partial Content',
			207 => 'Multi-Status',
			208 => 'Already Reported',
			209 => 'Unassigned',
			226 => 'IM Used',
			227 => 'Unassigned',
			300 => 'Multiple Choices',
			301 => 'Moved Permanently',
			302 => 'Found',
			303 => 'See Other',
			304 => 'Not Modified',
			305 => 'Use Proxy',
			306 => '(Unused)',
			307 => 'Temporary Redirect',
			308 => 'Permanent Redirect',
			309 => 'Unassigned',
			400 => 'Bad Request',
			401 => 'Unauthorized',
			402 => 'Payment Required',
			403 => 'Forbidden',
			404 => 'Not Found',
			405 => 'Method Not Allowed',
			406 => 'Not Acceptable',
			407 => 'Proxy Authentication Required',
			408 => 'Request Timeout',
			409 => 'Conflict',
			410 => 'Gone',
			411 => 'Length Required',
			412 => 'Precondition Failed',
			413 => 'Content Too Large',
			414 => 'URI Too Long',
			415 => 'Unsupported Media Type',
			416 => 'Range Not Satisfiable',
			417 => 'Expectation Failed',
			418 => '(Unused)',
			419 => 'Unassigned',
			421 => 'Misdirected Request',
			422 => 'Unprocessable Content',
			423 => 'Locked',
			424 => 'Failed Dependency',
			425 => 'Too Early',
			426 => 'Upgrade Required',
			427 => 'Unassigned',
			428 => 'Precondition Required',
			429 => 'Too Many Requests',
			430 => 'Unassigned',
			431 => 'Request Header Fields Too Large',
			432 => 'Unassigned',
			451 => 'Unavailable For Legal Reasons',
			452 => 'Unassigned',
			500 => 'Internal Server Error',
			501 => 'Not Implemented',
			502 => 'Bad Gateway',
			503 => 'Service Unavailable',
			504 => 'Gateway Timeout',
			505 => 'HTTP Version Not Supported',
			506 => 'Variant Also Negotiates',
			507 => 'Insufficient Storage',
			508 => 'Loop Detected',
			509 => 'Unassigned',
			510 => 'Not Extended (OBSOLETED)',
			511 => 'Network Authentication Required',
			512 => 'Unassigned'
		];
		return Container::keyValue($map, $key, '');
	}
}
