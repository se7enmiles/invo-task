<?php

/**
 * Front controller, takes all requests
 */

/**
 * Global Settings
 */

/**
 * Display errors
 */
ini_set('display_errors',0);
error_reporting(E_ALL);

/**
 * Start session
 */
session_start();

/**
 * Attach system files
 */
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

/**
 * Call the Router
 */
$router = new Router();
$router->run();