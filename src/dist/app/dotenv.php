<?php
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv(true);
$dotenv->loadEnv(BP . '/.env');
