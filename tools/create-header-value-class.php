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
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpFile;
use NoreSources\TypeDescription;
use NoreSources\Http\Header\AcceptAlternativeValueList;
use NoreSources\Http\Header\AlternativeValueListTrait;
use NoreSources\Http\Header\HeaderValueFactory;
use NoreSources\Http\Header\HeaderValueInterface;
use NoreSources\Http\Header\HeaderValueStringRepresentationTrait;
use NoreSources\Http\Header\HeaderValueTrait;
use NoreSources\Http\Header\TextHeaderValue;
require (__DIR__ . '/../vendor/autoload.php');

$argv = $_SERVER['argv'];
$headerName = null;
$createAlternativeValueListClass = false;
$fileBasePath = __DIR__ . '/../src/Header';
$overwrite = false;

foreach ($argv as $value)
{
	if ($value == '-a')
		$createAlternativeValueListClass = true;
	elseif ($value == '-f')
		$overwrite = true;
	else
		$headerName = $value;
}

$classnames = HeaderValueFactory::getHeaderValueClassnames($headerName);

$fileHeader = \file_get_contents(__DIR__ . '/../resources/templates/class-file-header.txt');
$fileHeader = \str_replace('{year}', date('Y'), $fileHeader);
$projectPath = realPath(__DIR__ . '/..');

$interfaceNames = [
	AcceptAlternativeValueList::class,
	HeaderValueInterface::class
];

$traits = [
	[
		AlternativeValueListTrait::class
	],
	[
		HeaderValueStringRepresentationTrait::class,
		HeaderValueTrait::class
	]
];

$constants = [
	[],
	[
		'VALUE_CLASS_NAME' => new Literal(TextHeaderValue::class . '::class')
	]
];

foreach ($classnames as $index => $classname)
{
	$classname = TypeDescription::getLocalName($classname, true);

	if ($index == 0)
		if (!$createAlternativeValueListClass)
			continue;

	$classFile = new PhpFile();
	$classFile->addComment($fileHeader);
	$classFile->addComment('@package Http');

	$ns = $classFile->addNamespace('NoreSources\Http\Header');

	$cls = $ns->addClass($classname);
	$cls->addImplement($interfaceNames[$index]);
	foreach ($traits[$index] as $trait)
	{
		$cls->addTrait($trait);
	}

	foreach ($constants[$index] as $name => $value)
	{
		$cls->addConstant($name, $value);
	}

	$dumper = new Dumper();

	$filePath = $projectPath . '/src/Header/' . $classname . '.php';
	if (!\file_exists($filePath) || $overwrite)
		file_put_contents($filePath, $classFile);
}