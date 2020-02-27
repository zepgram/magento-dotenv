<?php
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv(true);
$baseDir = dirname(__DIR__) . 'dotenv.php/';
$dotenv->loadEnv($baseDir . '.env');
