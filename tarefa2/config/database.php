<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/../');
$dotenv->load();

DEFINE('DATABASE_HOSTNAME', getenv('DATABASE_HOSTNAME') ?: 'localhost');
DEFINE('DATABASE_USERNAME', getenv('DATABASE_USERNAME') ?: 'localhost');
DEFINE('DATABASE_PASSWORD', getenv('DATABASE_PASSWORD') ?: 'localhost');
DEFINE('DATABASE_DATABASE', getenv('DATABASE_DATABASE') ?: 'localhost');