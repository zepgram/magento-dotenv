<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;
use Zepgram\Component\MagentoDotenv\MagentoDotenv;

$reflection = new \ReflectionClass(ClassLoader::class);
$rootDirectory = dirname($reflection->getFileName(), 3);
define('ROOT_DIRECTORY', $rootDirectory . DIRECTORY_SEPARATOR);

MagentoDotenv::init();
