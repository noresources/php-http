<?php

/**
 * Copyright © 2023 by Renaud Guillard (dev@nore.fr)
 * Distributed under the terms of the MIT License, see LICENSE
 *
 * @package HTTP
 */
namespace NoreSources\Http\Server;

use NoreSources\Container\Container;
use NoreSources\Data\Serialization\DataSerializerInterface;
use NoreSources\Data\Serialization\SerializableMediaTypeInterface;
use NoreSources\Data\Serialization\SerializationException;
use NoreSources\Data\Serialization\SerializationManager;
use NoreSources\Data\Serialization\StreamSerializerInterface;
use NoreSources\Data\Serialization\Traits\StreamSerializerBaseTrait;
use NoreSources\Data\Utility\MediaTypeListInterface;
use NoreSources\Http\StreamManager;
use NoreSources\Http\ContentNegociation\ContentNegociator;
use NoreSources\Http\Header\AcceptAlternativeValueList;
use NoreSources\Http\Header\HeaderField;
use NoreSources\Http\Header\HeaderValueFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use NoreSources\Type\TypeDescription;

class SerializationManagerResponsePopulator
{

	public function populateResponse(ResponseInterface $response,
		ServerRequestInterface $request, $content = null)
	{
		$serializer = $this->getSerializer();
		$negociator = ContentNegociator::getInstance();
		$availableMediaRanges = [];
		$acceptedMediaRanges = [];
		if ($request->hasHeader(HeaderField::ACCEPT))
		{
			/**
			 *
			 * @var AcceptAlternativeValueList $accept
			 */
			$accept = HeaderValueFactory::createFromMessage($request,
				HeaderField::ACCEPT);

			foreach ($accept as $value)
				$acceptedMediaRanges[] = $value->getMediaRange();
		}

		if ($serializer instanceof SerializableMediaTypeInterface)
		{
			if (Container::count($acceptedMediaRanges))
				$availableMediaRanges = $serializer->buildSerialiableMediaTypeListMatchingMediaRanges(
					$acceptedMediaRanges);
			else
				$availableMediaRanges = $serializer->getSerializableMediaRanges();
		}
		elseif ($serialized instanceof MediaTypeListInterface)
		{
			$availableMediaRanges = $serialized->getMediaTypes();
		}

		if (Container::count($availableMediaRanges) == 0)
			throw new \RuntimeException(
				'Unable to get serializer supported media types');

		$availables = [
			HeaderField::CONTENT_TYPE => $availableMediaRanges
		];

		$negociation = $negociator->negociate($request, $availables,
			ContentNegociator::ALL_MATCH);
		$contentType = null;
		$errors = [];

		$body = $response->getBody();

		foreach ($negociation[HeaderField::CONTENT_TYPE] as $mediaType)
		{
			try
			{
				if ($serializer instanceof StreamSerializerInterface)
				{
					if ($body->isSeekable())
						$body->rewind();
					$resource = StreamManager::getInstance()->getStreamResource(
						$body);

					/**
					 *
					 * @var StreamSerializerInterface $serializer
					 */
					$serializer->serializeToStream($resource, $content,
						$mediaType);
					$contentType = $mediaType;
					break;
				}
				elseif ($serializer instanceof DataSerializerInterface)
				{
					/**
					 *
					 * @var DataSerializerInterface $serializer
					 */

					$serialized = $serializer->serializeData($content,
						$mediaType);
					$body = StreamManager::getInstance()->createFileStream(
						'php://temp', 'rw');
					$body->write($serialized);
					$response = $response->withBody($body);
					$contentType = $mediaType;
					break;
				}
			}
			catch (SerializationException $e)
			{
				$errors[] = $e->getMessage();
			}

			if ($contentType)
				break;
		}

		if (!$contentType)
			throw new \RuntimeException(
				'Failed to serialize content: ' . \implode(', ', $errors));

		$negociation[HeaderField::CONTENT_TYPE] = $contentType;

		return $negociator->populateResponse($response, $negociation,
			$availables);
	}

	public function getSerializer()
	{
		if (!isset($this->serializer))
			$this->serializer = new SerializationManager();
		return $this->serializer;
	}

	public function setSerializer($serializer)
	{
		if ($serializer)
		{
			if (!(($serializer instanceof DataSerializerInterface) ||
				($serializer instanceof StreamSerializerInterface)))
			{
				$message = 'Object must implements ' .
					DataSerializerInterface::class . ' or ' .
					StreamSerializerInterface::class;
				throw new \InvalidArgumentException($message);
			}
		}
		$this->serializer = $serializer;
	}

	public function __construct($serializer = null)
	{
		$this->serializer = $serializer;
	}

	/**
	 *
	 * @var DataSerializerInterface|StreamSerializerInterface|SerializableMediaTypeInterface
	 */
	private $serializer;
}
