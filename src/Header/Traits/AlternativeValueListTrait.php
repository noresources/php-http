<?php
/**
 * Copyright © 2012 - 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Header\Traits;

use NoreSources\Container\Container;
use NoreSources\Type\TypeConversion;

trait AlternativeValueListTrait
{

	public function __construct($alternatives)
	{
		$this->setAlternatives($alternatives);
	}

	public function getAlternative($index)
	{
		if ($this->alternativeValues->offsetExists($index))
			return $this->alternativeValues->offsetGet($index);

		throw new \OutOfBoundsException();
	}

	public function count(): int
	{
		return $this->alternativeValues->count();
	}

	public function getIterator(): \Traversable
	{
		return $this->alternativeValues->getIterator();
	}

	public function __toString()
	{
		return Container::implode($this->alternativeValues, ', ',
			function ($index, $value) {
				return \strval($value);
			});
	}

	protected function setAlternatives($alternatives)
	{
		if (!($this->alternativeValues instanceof \ArrayObject))
			$this->alternativeValues = new \ArrayObject();

		if ($alternatives instanceof \ArrayObject)
			$this->alternativeValues = $alternatives;
		else
			$this->alternativeValues->exchangeArray(
				TypeConversion::toArray($alternatives));
	}

	/**
	 *
	 * @var \ArrayObject AlternativeHeaderValueInterface list
	 */
	private $alternativeValues;
}
