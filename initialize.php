<?php
    $hostParts = explode('.', $_SERVER['HTTP_HOST']);
    $subDomain = $hostParts[0];
    if($hostParts[1] === 'local') {
        define('ENVIRONMENT', 'DEV');
    } else {
        switch ($hostParts[0]) {
            case 'dev': define('ENVIRONMENT', 'DEV'); break;
            default: define('ENVIRONMENT', 'PROD');
        }
    }

    const ROOT_FILE = __DIR__;
    define("ROOT_WWW", ENVIRONMENT == 'DEV' ? 'http://' . $_SERVER['HTTP_HOST'] : 'https://' . $_SERVER['HTTP_HOST']);

    ob_start();
    require_once ROOT_FILE . '/configuration.php';
    require_once ROOT_FILE . '/router.php';

    require_once ROOT_FILE . '/controllers/core_controller.php';
    require_once ROOT_FILE . '/models/core_model.php';

    spl_autoload_register(function ($class) {
        if(file_exists(ROOT_FILE . '/controllers/' . strtolower($class) . '_controller.php')) {
            include ROOT_FILE . '/controllers/' . strtolower($class) . '_controller.php';
        }
    });
    spl_autoload_register(function ($class) {
        if(file_exists(ROOT_FILE . '/models/' . strtolower($class) . '_model.php')) {
            include ROOT_FILE . '/models/' . strtolower($class) . '_model.php';
        }
    });
    spl_autoload_register(function ($class) {
        if(file_exists(ROOT_FILE . '/helpers/' . strtolower($class) . '.php')) {
            include ROOT_FILE . '/helpers/' . strtolower($class) . '.php';
        }
    });
    require ROOT_FILE . '/vendor/autoload.php';
