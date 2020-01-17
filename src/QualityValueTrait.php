<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package Http
 */
namespace NoreSources\Http;

/**
 * Reference implementation of the QualityValueInterface
 */
trait QualityValueTrait
{

	public function getQualityValue()
	{
		return $this->qualityValue;
	}

	public function setQualityValue($qualityValue)
	{
		$this->qualityValue = min(1, max(0.001, $qualityValue));
	}

	/**
	 *
	 * @var float Quality value in the range [0.001, 1]
	 */
	private $qualityValue;
}