<?php

/**
 * Front controller
 * takes all requests
 */

/**
 * Global Settings
 * are used all over the project
 */

/**
 * Display errors
 * comment to disable showing errors
 */
ini_set('display_errors',1);
error_reporting(E_ALL);

/**
 * Attach system files
 */
define('ROOT', dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
require_once (ROOT.'/components/Database.php');

/**
 * Database connection
 */

/**
 * Call the router
 */
$router = new Router();
$router->run();