<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package HTTP
 */
namespace NoreSources\Http\Header;

use NoreSources\TypeDescription;
use NoreSources\TypeConversion;

trait HeaderValueTrait
{

	/**
	 * Reference constructor
	 *
	 * @param mixed $value
	 */
	public function __construct($value = null)
	{
		if ($value !== null)
			$this->setValue($value);
	}

	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Set header value
	 *
	 * @param mixed $value
	 *        	String or a object of the same type as VALUE_CLASS_NAME
	 */
	protected function setValue($value)
	{
		$self = new \ReflectionClass(static::class);
		if ($self->hasConstant('VALUE_CLASS_NAME'))
		{
			$valueClassName = $self->getConstant('VALUE_CLASS_NAME');
			if (\is_object($value) && \is_a($value, $valueClassName))
			{
				$this->value = $value;
				return;
			}
		}

		$value = TypeConversion::toString($value);
		if ($self->hasMethod('parseValue'))
			$this->value = \call_user_func([
				static::class,
				'parseValue'
			], $value);
		else
			$this->value = $value;
	}

	/**
	 *
	 * @var mixed
	 */
	private $value;
}