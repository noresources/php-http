<?php
/**
 * Copyright © 2012 - 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\ContentNegociation;

use NoreSources\Http\Status;
use NoreSources\Http\StatusExceptionInterface;
use NoreSources\Http\Traits\StatusExceptionTrait;

/**
 * Exception raised during content negociation.
 *
 * Exception error code corresponds to the HTTP status 406 Not Acceptable
 */
class ContentNegociationException extends \Exception implements
	StatusExceptionInterface
{

	use StatusExceptionTrait;

	/**
	 *
	 * @param string $negociationType
	 *        	HTTP header field name.
	 * @param string $details
	 *        	Exception details.
	 */
	public function __construct($negociationType, $details = '')
	{
		$this->negociationType = $negociationType;
		$message = $negociationType . ' negociation error';
		if (\strlen($details))
			$message .= ': ' . $details;
		parent::__construct($message, Status::NOT_ACCEPTABLE);
	}

	public function getNegociationType()
	{
		return $this->negociationType;
	}

	private $negociationType;
}
