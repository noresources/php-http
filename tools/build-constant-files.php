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

use Nette\PhpGenerator\Dumper;
use Nette\PhpGenerator\PhpFile;
use NoreSources\Container\Container;
use NoreSources\Http\Tools\FileBuilderHelper;
require (__DIR__ . '/../vendor/autoload.php');

$projectPath = realPath(__DIR__ . '/..');

$fileHeader = \file_get_contents(
	$projectPath . '/resources/templates/file-header.txt');
$fileHeader = \str_replace('{year}', date('Y'), $fileHeader);

$files = [
	[
		'input' => [
			'url' => 'https://www.iana.org/assignments/message-headers/perm-headers.csv',
			'file' => 'resources/data/perm-headers.csv',
			'columns' => [
				'name' => 0,
				'references' => 4
			],
			'validator' => function ($entry) {
				return \strcasecmp(Container::keyValue($entry, 2),
					'http') == 0;
			}
		],
		'target' => [
			'directory' => 'Header',
			'class' => 'HeaderField',
			'comment' => 'HTTP message header names',
			'constants' => [
				'comment' => 'HTTP message header field name'
			]
		]
	],
	[
		'input' => [
			'url' => 'https://www.iana.org/assignments/http-status-codes/http-status-codes-1.csv',
			'file' => 'resources/data/http-status-codes.csv',
			'columns' => [
				'name' => 1,
				'value' => 0,
				'references' => 2
			]
		],
		'target' => [
			'class' => 'Status',
			'comment' => 'HTTP status codes.' . PHP_EOL .
			'From the Hypertext Transfer Protocol (HTTP) Status Code Registry' .
			PHP_EOL .
			'@see https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml',
			"constants" => [
				'comment' => 'HTTP status code',
				'valueProcessor' => '\intval'
			],
			'reverseMap' => [
				'method' => 'getStatusText'
			]
		]
	],
	[
		'input' => [
			'url' => 'https://www.iana.org/assignments/http-authschemes/authschemes.csv',
			'file' => 'resources/data/authschemes.csv',
			'columns' => [
				'name' => 0,
				'references' => 1,
				'notes' => 2
			]
		],
		'target' => [
			'class' => 'AuthenticationScheme',
			'directory' => 'Authentication',
			'comment' => 'Hypertext Transfer Protocol (HTTP) Authentication Scheme',
			'constants' => [
				'comment' => 'authentication scheme'
			]
		]
	],
	[
		'input' => [
			'url' => 'http://www.iana.org/assignments/character-sets/character-sets-1.csv',
			'file' => 'resources/data/character-sets-1.csv',
			'columns' => [
				'name' => 1,
				'references' => 4,
				'notes' => 6
			]
		],
		'target' => [
			'directory' => '',
			'class' => 'Charset',
			'comment' => 'Registered charsets',
			'constants' => [
				'comment' => 'charset name'
			]
		]
	],
	[
		'input' => [
			'url' => 'http://www.iana.org/assignments/http-parameters/content-coding.csv',
			'file' => 'resources/data/content-coding.csv',
			'columns' => [
				'name' => 0,
				'references' => 2,
				'notes' => 1
			]
		],
		'target' => [
			'directory' => 'Coding',
			'class' => 'ContentCoding',
			'comment' => 'HTTP Content codings',
			'constants' => [
				'comment' => 'HTTP Content coding'
			]
		]
	]
];

foreach ($files as $file)
{
	$input = $file['input'];
	$target = $file['target'];

	$dataFilename = $projectPath . '/' . $input['file'];
	if (($url = Container::keyValue($input, 'url')))
	{
		if (!FileBuilderHelper::download($url, $dataFilename))
			continue;
	}

	$dataStream = \fopen($dataFilename, 'r');

	$className = $target['class'];
	$directory = Container::keyValue($target, 'directory', '');
	$constants = Container::keyValue($target, 'constants', []);
	$namespaces = \array_merge([
		'NoreSources',
		'Http'
	], \explode('/', $directory));

	$namespaces = \array_filter($namespaces, '\strlen');
	$namespaceString = \implode('\\', $namespaces);

	$classFile = new PhpFile();

	$classFile->addComment($fileHeader);

	$ns = $classFile->addNamespace($namespaceString);

	$classFile->addComment(
		'This file is generated by ' .
		\substr(__FILE__, \strlen($projectPath) + 1) . PHP_EOL . ' from ' .
		(Container::keyValue($input, 'url',
			Container::keyValue($input, 'file'))));

	$cls = $ns->addClass($className);

	$cls->addComment(Container::keyValue($target, 'comment', ''));

	$index = 0;
	$columns = Container::keyValue($input, 'columns', [
		'name' => 0
	]);

	$reverseMap = [];

	$validator = Container::keyValue($input, 'validator');

	while ($entry = \fgetcsv($dataStream))
	{
		if ($index++ == 0 && Container::keyValue($input, 'header', true))
			continue; // Column names

		if (\is_callable($validator) &&
			!\call_user_func($validator, $entry))
			continue;

		$name = Container::keyValue($entry,
			Container::keyValue($columns, 'name', -1), '');
		$value = Container::keyValue($entry,
			Container::keyValue($columns, 'value', -1), $name);
		$references = Container::keyValue($entry,
			Container::keyValue($columns, 'references', -1), '');
		$notes = Container::keyValue($entry,
			Container::keyValue($columns, 'notes', -1), '');

		if (empty($name) || empty($value))
			continue;

		$valueProcessor = Container::keyValue($constants,
			'valueProcessor');
		if (\is_callable($valueProcessor))
			$value = \call_user_func($valueProcessor, $value);

		$referenceLinks = FileBuilderHelper::makePhpDocReferenceLinks(
			$references);

		$constantName = \strtoupper(
			\preg_replace(',[^a-zA-Z0-9],', '_', $name));
		$constantComment = $name . ' ' .
			Container::keyValue($constants, 'comment', $className) .
			PHP_EOL . $notes . PHP_EOL . $referenceLinks;

		$constant = $cls->addConstant($constantName, $value);
		$constant->addComment($constantComment);

		if (Container::keyExists($target, 'reverseMap'))
			$reverseMap[$value] = $name;
	}

	\fclose($dataStream);

	$dumper = new Dumper();

	if (Container::keyExists($target, 'reverseMap'))
	{
		$ns->addUse(Container::class);

		$rm = Container::keyValue($target, 'reverseMap');
		$reverseMapMethodName = Container::keyValue($rm, 'method');
		$reverseMapMethodParameter = Container::keyValue($rm,
			'parameter', 'key');
		$reverseMapMethod = $cls->addMethod($reverseMapMethodName);
		$reverseMapMethod->setStatic(true);
		$reverseMapMethod->addParameter($reverseMapMethodParameter);

		$reverseMapMethodBody = 'static $map = ' .
			$dumper->dump($reverseMap) . ';' . PHP_EOL;
		$reverseMapMethodBody .= 'return Container::keyValue ($map, $' .
			$reverseMapMethodParameter . ', \'\');';
		$reverseMapMethod->setBody($reverseMapMethodBody);
	}

	file_put_contents(
		$projectPath . '/src/' . $directory . '/' . $className . '.php',
		$classFile);
}