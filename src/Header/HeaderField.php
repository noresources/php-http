<?php

/**
 * Copyright © 2021 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 * This file is generated by tools/build-constant-files.php
 *  from https://www.iana.org/assignments/message-headers/perm-headers.csv
 */

namespace NoreSources\Http\Header;

/**
 * HTTP message header names
 */
class HeaderField
{
	/**
	 * A-IM HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const A_IM = 'A-IM';

	/**
	 * Accept HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.3.2
	 */
	const ACCEPT = 'Accept';

	/**
	 * Accept-Additions HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const ACCEPT_ADDITIONS = 'Accept-Additions';

	/**
	 * Accept-CH HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8942#section-3.1
	 */
	const ACCEPT_CH = 'Accept-CH';

	/**
	 * Accept-Charset HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.3.3
	 */
	const ACCEPT_CHARSET = 'Accept-Charset';

	/**
	 * Accept-Datetime HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7089
	 */
	const ACCEPT_DATETIME = 'Accept-Datetime';

	/**
	 * Accept-Encoding HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.3.4
	 *
	 * @see https://tools.ietf.org/html/rfc7694#section-3
	 */
	const ACCEPT_ENCODING = 'Accept-Encoding';

	/**
	 * Accept-Features HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const ACCEPT_FEATURES = 'Accept-Features';

	/**
	 * Accept-Language HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.3.5
	 */
	const ACCEPT_LANGUAGE = 'Accept-Language';

	/**
	 * Accept-Patch HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc5789
	 */
	const ACCEPT_PATCH = 'Accept-Patch';

	/**
	 * Accept-Post HTTP message header field name
	 *
	 * [https://www.w3.org/TR/ldp/]
	 */
	const ACCEPT_POST = 'Accept-Post';

	/**
	 * Accept-Ranges HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7233#section-2.3
	 */
	const ACCEPT_RANGES = 'Accept-Ranges';

	/**
	 * Age HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7234#section-5.1
	 */
	const AGE = 'Age';

	/**
	 * Allow HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-7.4.1
	 */
	const ALLOW = 'Allow';

	/**
	 * ALPN HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7639#section-2
	 */
	const ALPN = 'ALPN';

	/**
	 * Alt-Svc HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7838
	 */
	const ALT_SVC = 'Alt-Svc';

	/**
	 * Alt-Used HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7838
	 */
	const ALT_USED = 'Alt-Used';

	/**
	 * Alternates HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const ALTERNATES = 'Alternates';

	/**
	 * Apply-To-Redirect-Ref HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4437
	 */
	const APPLY_TO_REDIRECT_REF = 'Apply-To-Redirect-Ref';

	/**
	 * Authentication-Control HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8053#section-4
	 */
	const AUTHENTICATION_CONTROL = 'Authentication-Control';

	/**
	 * Authentication-Info HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7615#section-3
	 */
	const AUTHENTICATION_INFO = 'Authentication-Info';

	/**
	 * Authorization HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7235#section-4.2
	 */
	const AUTHORIZATION = 'Authorization';

	/**
	 * C-Ext HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const C_EXT = 'C-Ext';

	/**
	 * C-Man HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const C_MAN = 'C-Man';

	/**
	 * C-Opt HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const C_OPT = 'C-Opt';

	/**
	 * C-PEP HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const C_PEP = 'C-PEP';

	/**
	 * C-PEP-Info HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const C_PEP_INFO = 'C-PEP-Info';

	/**
	 * Cache-Control HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7234#section-5.2
	 */
	const CACHE_CONTROL = 'Cache-Control';

	/**
	 * Cal-Managed-ID HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8607#section-5.1
	 */
	const CAL_MANAGED_ID = 'Cal-Managed-ID';

	/**
	 * CalDAV-Timezones HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7809#section-7.1
	 */
	const CALDAV_TIMEZONES = 'CalDAV-Timezones';

	/**
	 * CDN-Loop HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8586
	 */
	const CDN_LOOP = 'CDN-Loop';

	/**
	 * Cert-Not-After HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8739#section-3.3
	 */
	const CERT_NOT_AFTER = 'Cert-Not-After';

	/**
	 * Cert-Not-Before HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8739#section-3.3
	 */
	const CERT_NOT_BEFORE = 'Cert-Not-Before';

	/**
	 * Close HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-8.1
	 */
	const CLOSE = 'Close';

	/**
	 * Connection HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-6.1
	 */
	const CONNECTION = 'Connection';

	/**
	 * Content-Base HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc2068
	 *
	 * @see https://tools.ietf.org/html/rfc2616
	 */
	const CONTENT_BASE = 'Content-Base';

	/**
	 * Content-Disposition HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6266
	 */
	const CONTENT_DISPOSITION = 'Content-Disposition';

	/**
	 * Content-Encoding HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-3.1.2.2
	 */
	const CONTENT_ENCODING = 'Content-Encoding';

	/**
	 * Content-ID HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const CONTENT_ID = 'Content-ID';

	/**
	 * Content-Language HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-3.1.3.2
	 */
	const CONTENT_LANGUAGE = 'Content-Language';

	/**
	 * Content-Length HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-3.3.2
	 */
	const CONTENT_LENGTH = 'Content-Length';

	/**
	 * Content-Location HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-3.1.4.2
	 */
	const CONTENT_LOCATION = 'Content-Location';

	/**
	 * Content-MD5 HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const CONTENT_MD5 = 'Content-MD5';

	/**
	 * Content-Range HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7233#section-4.2
	 */
	const CONTENT_RANGE = 'Content-Range';

	/**
	 * Content-Script-Type HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const CONTENT_SCRIPT_TYPE = 'Content-Script-Type';

	/**
	 * Content-Style-Type HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const CONTENT_STYLE_TYPE = 'Content-Style-Type';

	/**
	 * Content-Type HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-3.1.1.5
	 */
	const CONTENT_TYPE = 'Content-Type';

	/**
	 * Content-Version HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const CONTENT_VERSION = 'Content-Version';

	/**
	 * Cookie HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6265
	 */
	const COOKIE = 'Cookie';

	/**
	 * Cookie2 HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc2965
	 *
	 * @see https://tools.ietf.org/html/rfc6265
	 */
	const COOKIE2 = 'Cookie2';

	/**
	 * DASL HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc5323
	 */
	const DASL = 'DASL';

	/**
	 * DAV HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const DAV = 'DAV';

	/**
	 * Date HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-7.1.1.2
	 */
	const DATE = 'Date';

	/**
	 * Default-Style HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const DEFAULT_STYLE = 'Default-Style';

	/**
	 * Delta-Base HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const DELTA_BASE = 'Delta-Base';

	/**
	 * Depth HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const DEPTH = 'Depth';

	/**
	 * Derived-From HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const DERIVED_FROM = 'Derived-From';

	/**
	 * Destination HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const DESTINATION = 'Destination';

	/**
	 * Differential-ID HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const DIFFERENTIAL_ID = 'Differential-ID';

	/**
	 * Digest HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const DIGEST = 'Digest';

	/**
	 * Early-Data HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8470
	 */
	const EARLY_DATA = 'Early-Data';

	/**
	 * ETag HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7232#section-2.3
	 */
	const ETAG = 'ETag';

	/**
	 * Expect HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.1.1
	 */
	const EXPECT = 'Expect';

	/**
	 * Expect-CT HTTP message header field name
	 *
	 * [RFC-ietf-httpbis-expect-ct-08]
	 */
	const EXPECT_CT = 'Expect-CT';

	/**
	 * Expires HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7234#section-5.3
	 */
	const EXPIRES = 'Expires';

	/**
	 * Ext HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const EXT = 'Ext';

	/**
	 * Forwarded HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7239
	 */
	const FORWARDED = 'Forwarded';

	/**
	 * From HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.5.1
	 */
	const FROM = 'From';

	/**
	 * GetProfile HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const GETPROFILE = 'GetProfile';

	/**
	 * Hobareg HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7486#section-6.1.1
	 */
	const HOBAREG = 'Hobareg';

	/**
	 * Host HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-5.4
	 */
	const HOST = 'Host';

	/**
	 * HTTP2-Settings HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7540#section-3.2.1
	 */
	const HTTP2_SETTINGS = 'HTTP2-Settings';

	/**
	 * IM HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const IM = 'IM';

	/**
	 * If HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const IF = 'If';

	/**
	 * If-Match HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7232#section-3.1
	 */
	const IF_MATCH = 'If-Match';

	/**
	 * If-Modified-Since HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7232#section-3.3
	 */
	const IF_MODIFIED_SINCE = 'If-Modified-Since';

	/**
	 * If-None-Match HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7232#section-3.2
	 */
	const IF_NONE_MATCH = 'If-None-Match';

	/**
	 * If-Range HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7233#section-3.2
	 */
	const IF_RANGE = 'If-Range';

	/**
	 * If-Schedule-Tag-Match HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6638
	 */
	const IF_SCHEDULE_TAG_MATCH = 'If-Schedule-Tag-Match';

	/**
	 * If-Unmodified-Since HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7232#section-3.4
	 */
	const IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';

	/**
	 * Include-Referred-Token-Binding-ID HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8473
	 */
	const INCLUDE_REFERRED_TOKEN_BINDING_ID = 'Include-Referred-Token-Binding-ID';

	/**
	 * Keep-Alive HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const KEEP_ALIVE = 'Keep-Alive';

	/**
	 * Label HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const LABEL = 'Label';

	/**
	 * Last-Modified HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7232#section-2.2
	 */
	const LAST_MODIFIED = 'Last-Modified';

	/**
	 * Link HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8288
	 */
	const LINK = 'Link';

	/**
	 * Location HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-7.1.2
	 */
	const LOCATION = 'Location';

	/**
	 * Lock-Token HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const LOCK_TOKEN = 'Lock-Token';

	/**
	 * Man HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const MAN = 'Man';

	/**
	 * Max-Forwards HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.1.2
	 */
	const MAX_FORWARDS = 'Max-Forwards';

	/**
	 * Memento-Datetime HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7089
	 */
	const MEMENTO_DATETIME = 'Memento-Datetime';

	/**
	 * Meter HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const METER = 'Meter';

	/**
	 * MIME-Version HTTP message header field name
	 *
	 * [RFC7231, Appendix A.1]
	 */
	const MIME_VERSION = 'MIME-Version';

	/**
	 * Negotiate HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const NEGOTIATE = 'Negotiate';

	/**
	 * OData-EntityId HTTP message header field name
	 *
	 * [OData Version 4.01 Part 1: Protocol][OASIS][Chet_Ensign]
	 */
	const ODATA_ENTITYID = 'OData-EntityId';

	/**
	 * OData-Isolation HTTP message header field name
	 *
	 * [OData Version 4.01 Part 1: Protocol][OASIS][Chet_Ensign]
	 */
	const ODATA_ISOLATION = 'OData-Isolation';

	/**
	 * OData-MaxVersion HTTP message header field name
	 *
	 * [OData Version 4.01 Part 1: Protocol][OASIS][Chet_Ensign]
	 */
	const ODATA_MAXVERSION = 'OData-MaxVersion';

	/**
	 * OData-Version HTTP message header field name
	 *
	 * [OData Version 4.01 Part 1: Protocol][OASIS][Chet_Ensign]
	 */
	const ODATA_VERSION = 'OData-Version';

	/**
	 * Opt HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const OPT = 'Opt';

	/**
	 * Optional-WWW-Authenticate HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8053#section-3
	 */
	const OPTIONAL_WWW_AUTHENTICATE = 'Optional-WWW-Authenticate';

	/**
	 * Ordering-Type HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const ORDERING_TYPE = 'Ordering-Type';

	/**
	 * Origin HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6454
	 */
	const ORIGIN = 'Origin';

	/**
	 * OSCORE HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8613#section-11.1
	 */
	const OSCORE = 'OSCORE';

	/**
	 * Overwrite HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const OVERWRITE = 'Overwrite';

	/**
	 * P3P HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const P3P = 'P3P';

	/**
	 * PEP HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PEP = 'PEP';

	/**
	 * PICS-Label HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PICS_LABEL = 'PICS-Label';

	/**
	 * Pep-Info HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PEP_INFO = 'Pep-Info';

	/**
	 * Position HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const POSITION = 'Position';

	/**
	 * Pragma HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7234#section-5.4
	 */
	const PRAGMA = 'Pragma';

	/**
	 * Prefer HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7240
	 */
	const PREFER = 'Prefer';

	/**
	 * Preference-Applied HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7240
	 */
	const PREFERENCE_APPLIED = 'Preference-Applied';

	/**
	 * ProfileObject HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROFILEOBJECT = 'ProfileObject';

	/**
	 * Protocol HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROTOCOL = 'Protocol';

	/**
	 * Protocol-Info HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROTOCOL_INFO = 'Protocol-Info';

	/**
	 * Protocol-Query HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROTOCOL_QUERY = 'Protocol-Query';

	/**
	 * Protocol-Request HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROTOCOL_REQUEST = 'Protocol-Request';

	/**
	 * Proxy-Authenticate HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7235#section-4.3
	 */
	const PROXY_AUTHENTICATE = 'Proxy-Authenticate';

	/**
	 * Proxy-Authentication-Info HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7615#section-4
	 */
	const PROXY_AUTHENTICATION_INFO = 'Proxy-Authentication-Info';

	/**
	 * Proxy-Authorization HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7235#section-4.4
	 */
	const PROXY_AUTHORIZATION = 'Proxy-Authorization';

	/**
	 * Proxy-Features HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROXY_FEATURES = 'Proxy-Features';

	/**
	 * Proxy-Instruction HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PROXY_INSTRUCTION = 'Proxy-Instruction';

	/**
	 * Public HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const PUBLIC = 'Public';

	/**
	 * Public-Key-Pins HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7469
	 */
	const PUBLIC_KEY_PINS = 'Public-Key-Pins';

	/**
	 * Public-Key-Pins-Report-Only HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7469
	 */
	const PUBLIC_KEY_PINS_REPORT_ONLY = 'Public-Key-Pins-Report-Only';

	/**
	 * Range HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7233#section-3.1
	 */
	const RANGE = 'Range';

	/**
	 * Redirect-Ref HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4437
	 */
	const REDIRECT_REF = 'Redirect-Ref';

	/**
	 * Referer HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.5.2
	 */
	const REFERER = 'Referer';

	/**
	 * Replay-Nonce HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8555#section-6.5.1
	 */
	const REPLAY_NONCE = 'Replay-Nonce';

	/**
	 * Retry-After HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-7.1.3
	 */
	const RETRY_AFTER = 'Retry-After';

	/**
	 * Safe HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const SAFE = 'Safe';

	/**
	 * Schedule-Reply HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6638
	 */
	const SCHEDULE_REPLY = 'Schedule-Reply';

	/**
	 * Schedule-Tag HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6638
	 */
	const SCHEDULE_TAG = 'Schedule-Tag';

	/**
	 * Sec-Token-Binding HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8473
	 */
	const SEC_TOKEN_BINDING = 'Sec-Token-Binding';

	/**
	 * Sec-WebSocket-Accept HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6455
	 */
	const SEC_WEBSOCKET_ACCEPT = 'Sec-WebSocket-Accept';

	/**
	 * Sec-WebSocket-Extensions HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6455
	 */
	const SEC_WEBSOCKET_EXTENSIONS = 'Sec-WebSocket-Extensions';

	/**
	 * Sec-WebSocket-Key HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6455
	 */
	const SEC_WEBSOCKET_KEY = 'Sec-WebSocket-Key';

	/**
	 * Sec-WebSocket-Protocol HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6455
	 */
	const SEC_WEBSOCKET_PROTOCOL = 'Sec-WebSocket-Protocol';

	/**
	 * Sec-WebSocket-Version HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6455
	 */
	const SEC_WEBSOCKET_VERSION = 'Sec-WebSocket-Version';

	/**
	 * Security-Scheme HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const SECURITY_SCHEME = 'Security-Scheme';

	/**
	 * Server HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-7.4.2
	 */
	const SERVER = 'Server';

	/**
	 * Set-Cookie HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6265
	 */
	const SET_COOKIE = 'Set-Cookie';

	/**
	 * Set-Cookie2 HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc2965
	 *
	 * @see https://tools.ietf.org/html/rfc6265
	 */
	const SET_COOKIE2 = 'Set-Cookie2';

	/**
	 * SetProfile HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const SETPROFILE = 'SetProfile';

	/**
	 * SLUG HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc5023
	 */
	const SLUG = 'SLUG';

	/**
	 * SoapAction HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const SOAPACTION = 'SoapAction';

	/**
	 * Status-URI HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const STATUS_URI = 'Status-URI';

	/**
	 * Strict-Transport-Security HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc6797
	 */
	const STRICT_TRANSPORT_SECURITY = 'Strict-Transport-Security';

	/**
	 * Sunset HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8594
	 */
	const SUNSET = 'Sunset';

	/**
	 * Surrogate-Capability HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const SURROGATE_CAPABILITY = 'Surrogate-Capability';

	/**
	 * Surrogate-Control HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const SURROGATE_CONTROL = 'Surrogate-Control';

	/**
	 * TCN HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const TCN = 'TCN';

	/**
	 * TE HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-4.3
	 */
	const TE = 'TE';

	/**
	 * Timeout HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4918
	 */
	const TIMEOUT = 'Timeout';

	/**
	 * Topic HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8030#section-5.4
	 */
	const TOPIC = 'Topic';

	/**
	 * Trailer HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-4.4
	 */
	const TRAILER = 'Trailer';

	/**
	 * Transfer-Encoding HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-3.3.1
	 */
	const TRANSFER_ENCODING = 'Transfer-Encoding';

	/**
	 * TTL HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8030#section-5.2
	 */
	const TTL = 'TTL';

	/**
	 * Urgency HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc8030#section-5.3
	 */
	const URGENCY = 'Urgency';

	/**
	 * URI HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const URI = 'URI';

	/**
	 * Upgrade HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-6.7
	 */
	const UPGRADE = 'Upgrade';

	/**
	 * User-Agent HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-5.5.3
	 */
	const USER_AGENT = 'User-Agent';

	/**
	 * Variant-Vary HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const VARIANT_VARY = 'Variant-Vary';

	/**
	 * Vary HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7231#section-7.1.4
	 */
	const VARY = 'Vary';

	/**
	 * Via HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7230#section-5.7.1
	 */
	const VIA = 'Via';

	/**
	 * WWW-Authenticate HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7235#section-4.1
	 */
	const WWW_AUTHENTICATE = 'WWW-Authenticate';

	/**
	 * Want-Digest HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc4229
	 */
	const WANT_DIGEST = 'Want-Digest';

	/**
	 * Warning HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7234#section-5.5
	 */
	const WARNING = 'Warning';

	/**
	 * X-Content-Type-Options HTTP message header field name
	 *
	 * [https://fetch.spec.whatwg.org/#x-content-type-options-header]
	 */
	const X_CONTENT_TYPE_OPTIONS = 'X-Content-Type-Options';

	/**
	 * X-Frame-Options HTTP message header field name
	 *
	 *
	 * @see https://tools.ietf.org/html/rfc7034
	 */
	const X_FRAME_OPTIONS = 'X-Frame-Options';
}
