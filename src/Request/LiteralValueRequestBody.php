<?php
namespace NoreSources\Http\Request;

use NoreSources\LiteralValueInterface;

class LiteralValueRequestBody implements LiteralValueInterface
{

	/**
	 *
	 * @param null|boolean|integer|float|string $value
	 */
	public function __construct($value)
	{
		$this->value = $value;
	}

	public function getLiteralValue()
	{
		return $this->value;
	}

	/**
	 * Literal value
	 *
	 * @var null|boolean|integer|float|string
	 */
	private $value;
}
