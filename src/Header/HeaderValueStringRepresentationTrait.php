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

use NoreSources\TypeConversion;
use NoreSources\Http\ParameterMapProviderInterface;
use NoreSources\Http\ParameterMapSerializer;
use NoreSources\Http\QualityValueInterface;

trait HeaderValueStringRepresentationTrait
{

	/**
	 *
	 * @return string
	 */
	public function __toString()
	{
		$s = '';
		if ($this instanceof HeaderValueInterface)
			$s .= TypeConversion::toString($this->getValue());
		if ($this instanceof QualityValueInterface)
			$s .= '; q=' . sprintf('%.3f', $this->getQualityValue());
		if ($this instanceof ParameterMapProviderInterface && $this->getParameters()->count())
			$s .= '; ' . ParameterMapSerializer::serializeParameters($this->getParameterIterator());
		return $s;
	}
}