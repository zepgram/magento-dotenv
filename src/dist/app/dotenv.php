<?php
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->usePutEnv(true);
$dotenv->loadEnv(BP . '/.env');
