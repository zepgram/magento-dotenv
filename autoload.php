<?php

use Composer\Autoload\ClassLoader;
use Zepgram\Component\MagentoDotenv\MagentoDotenv;

$reflection = new \ReflectionClass(ClassLoader::class);
$rootDirectory = dirname(dirname(dirname($reflection->getFileName())));
define('ROOT_DIRECTORY', $rootDirectory . DIRECTORY_SEPARATOR);

MagentoDotenv::init();
