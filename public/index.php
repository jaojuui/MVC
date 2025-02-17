<?php

declare(strict_types=1);

error_reporting(E_ALL); 
ini_set('display_errors',1); 
ini_set('display_startup_errors',1);

// Constant values for this project
// define('DATABASE_DIR', __DIR__ . '/../databases');
const DATABASE_DIR = __DIR__ . '/../app/databases';
const INCLUDES_DIR = __DIR__ . '/../app/includes';
const ROUTE_DIR = __DIR__ . '/../app/routes';
const TEMPLATES_DIR = __DIR__ . '/../app/templates';

session_start();

// Include router and view renderer
require_once INCLUDES_DIR . '/db.php';
require_once INCLUDES_DIR . '/router.php';
require_once INCLUDES_DIR . '/view.php';

// Call dispatch to handle requests
const PUBLIC_ROUTES = ['/', '/login'];

if (in_array(strtolower($_SERVER['REQUEST_URI']), PUBLIC_ROUTES)) {
    dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    exit;
} elseif (isset($_SESSION['timestamp']) && time() - $_SESSION['timestamp'] < 10) {
    // 10 Sec.
    $unix_timestamp = time();
    $_SESSION['timestamp'] = $unix_timestamp;
    dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} else {
    unset($_SESSION['timestamp']);
    header('Location: /');
    exit;
}
