<?php

use Pecee\SimpleRouter\SimpleRouter;

// Autoload the vendor file
require_once __DIR__ . '/vendor/autoload.php';

// Load from environment
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Define 
define('ROOT', __DIR__);
define('VIEWS', __DIR__ . '/views');
define('ASSETS', __DIR__ . '/assets');
define('BASE_DIR', isset($_ENV['BASE_DIR']) ? $_ENV['BASE_DIR'] : '');
define('URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . BASE_DIR);
define('ASSETS_URL', URL . '/assets');

/* Load external routes file */
require_once 'routes/route.php';

SimpleRouter::setDefaultNamespace('\App\Controllers');

// Start the routing
SimpleRouter::start();
