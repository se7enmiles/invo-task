<?php

/**
 * autoload function to attach classes automatically
 */
spl_autoload_register(function($class_name)
{
    // array of folders
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );

    foreach ($array_paths as $path) {

        // generate path to the file + filename
        $path = ROOT . $path . $class_name . '.php';

        // attach file
        if (is_file($path)) {
            include_once $path;
        }
    }
});
