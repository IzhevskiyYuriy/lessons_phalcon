<?php

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\Application;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Config;
use Phalcon\Flash\Direct as FlashDirect;


define ('BASE_PATH', dirname(__DIR__));
define ('APP_PATH', BASE_PATH . '/app');

$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers',
        APP_PATH . '/models',
        APP_PATH . '/forms',
    ]
);

$loader->register();

$di = new FactoryDefault();

$di->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');

        $view->registerEngines(
            [
                ".volt" => "Phalcon\Mvc\View\Engine\Volt"
            ]
        );

        return $view;
    }
);

// Users the flash service with custom CSS classes
$di->set(
    "flash",
    function () {
        $flash = new FlashDirect(
            [
                "error"   => "alert alert-danger",
                "success" => "alert alert-success",
                "notice"  => "alert alert-info",
                "warning" => "alert alert-warning",
            ]
        );

        return $flash;
    }
);

$di->set(
    'url',
    function () {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    }
);

$di->set(
    "db",
    function () {
        return new DbAdapter(
            [
                "host"     => "localhost",
                "username" => "root",
                "password" => "1234",
                "dbname"   => "testphalcon",
            ]
        );
    }
);




$application = new Application($di);
try{
    echo $application->handle(!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null)->getContent();
} catch (Exception $e){
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}




/**
 * $response = $application->handle(!empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null)->getContent();
$response->send();
}catch (\Exception $e){
echo 'Exception: ', $e->getMessage();
}
 */