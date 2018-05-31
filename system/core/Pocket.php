<?php

function Pocket()
{
    global $config;

    // Setting defaults
    $controller = $config['default_controller'];
    $action = 'index';
    $url = '';

    // Getting requests and script url
    $request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
    $script_url = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';


    if ($request_url != $script_url) $url = trim(preg_replace('/' . str_replace('/', '\/', str_replace('index.php', '', $script_url)) . '/', '', $request_url, 1), '/');

    // Segments
    $segments = explode('/', $url);

    // Checking
    if (isset($segments[0]) && $segments[0] != '') $controller = $segments[0];
    if (isset($segments[1]) && $segments[1] != '') $action = $segments[1];

    // Getting the controller file
    $path = APP_DIR . 'controllers/' . $controller . '.php';
    if (file_exists($path)) {
        require_once($path);
    } else {
        $controller = $config['error_controller'];
        require_once(APP_DIR . 'controllers/' . $controller . '.php');
    }

    if (!method_exists($controller, $action)) {
        $controller = $config['error_controller'];
        require_once(APP_DIR . 'controllers/' . $controller . '.php');
        $action = 'index';
    }

    $obj = new $controller;
    die(call_user_func_array(array($obj, $action), array_slice($segments, 2)));
}

