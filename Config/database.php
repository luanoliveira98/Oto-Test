<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/../');
$dotenv->load();

DEFINE('DATABASE_SYSTEM', getenv('DATABASE_SYSTEM') ?: 'mysql');
DEFINE('DATABASE_HOSTNAME', getenv('DATABASE_HOSTNAME') ?: 'localhost');
DEFINE('DATABASE_USERNAME', getenv('DATABASE_USERNAME') ?: 'root');
DEFINE('DATABASE_PASSWORD', getenv('DATABASE_PASSWORD') ?: '');
DEFINE('DATABASE_DATABASE', getenv('DATABASE_DATABASE') ?: 'oto');