<?php

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) . '/');
define('APP_DIR', ROOT_DIR . 'application/');

// Includes
require(APP_DIR . 'config/config.php');
require(ROOT_DIR . 'system/core/Model.php');
require(ROOT_DIR . 'system/core/View.php');
require(ROOT_DIR . 'system/core/Loader.php');
require(ROOT_DIR . 'system/core/Controller.php');
require(ROOT_DIR . 'system/core/Pocket.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

Pocket();