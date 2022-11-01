<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Url;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\ViewBaseInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Session\Manager;
use Phalcon\Session\Adapter\Stream;
use Phalcon\Mvc\Model\MetaData\Memory;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Session\Bag as SessionBag;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
// ...

$loader = new Loader();
$loader->setDirectories(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
        APP_PATH . '/config/',
    ]
);

$loader->register();

$container = new FactoryDefault();

$container->setShared(
    'voltService',
    function (ViewBaseInterface $view) use ($container) {
        $volt = new Volt($view, $container);
        $volt->setOptions(
            [
                'always'    => true,
                'extension' => '.php',
                'separator' => '_',
                'stat'      => true,
                'path'      => APP_PATH . ('/cache/volt/'),
                'prefix'    => '-prefix-',
            ]
        );

        return $volt;
    }
);

$container->set(
    'view',
    function () {
        $view = new View();

        $view->setViewsDir(APP_PATH . '/views/');

        $view->registerEngines(
            [
                '.volt' => 'voltService',
            ]
        );

        return $view;
    }
);

//Session
$container->setShared('session', function () {
    $session = new Manager();
    $files = new Stream([
        'savePath' => '/tmp'
    ]);
    $session->setAdapter($files)->start();
    return $session;
});

//Meta-data
$container['modelsMetaData'] = function () {

    $metaData = new Memory([
        "lifetime" => 86400,
        "prefix" => "metaData"
    ]);
    return $metaData;
};

$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');

        return $url;
    }
);

$container->set(
    'db',
    function () {
        return new Mysql(
            [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => 'PorscheGt3RS',
                'dbname'   => 'epsilon',
            ]
        );
    }
);

/*$container->set('dispatcher', function () use ($container) {
    $eventsManager = $container->getShared('eventsManager');

    //Clase de permisos
    $permission = new Permission();

    //Escucha los eventos de la clase permisos
    $eventsManager->attach('dispatch', $permission);

    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});*/

$application = new Application($container);

try {
    // Handle the request
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}
