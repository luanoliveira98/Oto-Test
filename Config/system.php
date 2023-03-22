<?php

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/../');
$dotenv->load();

DEFINE('BASE_URL', getenv('BASE_URL') ?: 'http://localhost:3333');