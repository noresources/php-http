<?php
/**
 * Copyright © 2012 - 2020 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 */

/**
 *
 * @package HTTP
 */
namespace NoreSources\Http;

use NoreSources\Http\Header\AcceptHeaderValue;
use NoreSources\MediaType\MediaRange;
use NoreSources\MediaType\MediaTypeInterface;

class ContentTypeNegociation
{

	/**
	 * Compute the quality value of the given media type against a list of accepted media ranges.
	 *
	 * @param MediaTypeInterface $contentType
	 * @param \Traversable $acceptedMediaRanges
	 *        	List of AcceptHeaderValue
	 * @return number Quality value in the range [0.001, 1] or -1 if media type is not acceptable
	 */
	public static function getContentTypeQualityValue(MediaTypeInterface $contentType,
		$acceptedMediaRanges)
	{
		$conformanceScore = -1;
		$qualityValue = -1;
		$subTypeText = \strval($contentType->getSubType());

		foreach ($acceptedMediaRanges as $acceptedMediaRange)
		{
			if ($acceptedMediaRange instanceof AcceptHeaderValue)
			{
				$mediaRange = $acceptedMediaRange->getMediaRange();
				assert($mediaRange instanceof MediaTypeInterface);
				;

				$parameterScore = 0;
				$mainTypeScore = 0;
				$subTypeScore = 0;

				if ($mediaRange->getType() != MediaRange::ANY)
				{
					if ($mediaRange->getType() != $contentType->getType())
						continue;

					$mainTypeScore = 1;
				}

				$mrst = \strval($mediaRange->getSubType());
				if ($mrst != MediaRange::ANY)
				{
					if ($mrst != $subTypeText)
						continue;

					$subTypeScore = 1;
				}

				$pc = $mediaRange->getParameters()->count();
				if ($pc)
				{
					foreach ($mediaRange->getParameters() as $name => $value)
					{
						if ($contentType->getParameters()[$name] == $value)
							$parameterScore++;
					}

					$parameterScore /= $pc;
				}

				$score = $mainTypeScore + 10 * $subTypeScore + $parameterScore;

				if ($score > $conformanceScore)
				{
					$qualityValue = $acceptedMediaRange->getQualityValue();
					$conformanceScore = $score;
				}
			}
		}

		return $qualityValue;
	}

	/**
	 *
	 * @param array<MediaTypeInterface> $contentTypes
	 * @param unknown $acceptedMediaRanges
	 */
	public static function getAcceptedContentTypes($contentTypes, $acceptedMediaRanges)
	{
		$qvalues = [];
		foreach ($contentTypes as $key => $contentType)
		{
			$qvalues[$key] = self::getContentTypeQualityValue($contentType, $acceptedMediaRanges);
		}

		uksort($contentTypes,
			function ($a, $b) use ($qvalues) {
				return $qvalues[$a] > $qvalues[$b];
			});
	}
}