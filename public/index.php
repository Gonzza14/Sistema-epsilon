<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Url;
use Phalcon\Db\Adapter\Pdo\Mysql;
/*use Phalcon\Flash\Direct as Flash;*/
//use Phalcon\Escaper;
use Phalcon\Mvc\ViewBaseInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Session\Manager;
use Phalcon\Session\Adapter\Stream;
use Phalcon\Mvc\Model\MetaData\Memory;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Session\Bag as SessionBag;
use Phalcon\Flash\Session as FlashSession;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
// ...



$loader = new Loader();
$loader->setDirectories(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
        APP_PATH . '/config/',
        APP_PATH . '/plugins/',
        APP_PATH . '/library/',
    ]
);

$loader->register();

$loader->setNamespaces(
    [
        "security" =>  APP_PATH . '/models/'
    ]
);

$loader->setClasses(
    [
        'Mail' => APP_PATH . "/library/Mail/Mail.php"
    ]
);

$container = new FactoryDefault();

/*$container->setShared('config', function () {
    return APP_PATH . "/config/config.php";
});*/

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
                'prefix'    => '-prefix-',
                'path' => function ($templatePath) {
                    return $templatePath . '.php';
                }
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
        'SAVEPATH' => '/tmp'
    ]);
    $session->setAdapter($files)->start();
    return $session;
});

$container->setShared('sessionBag', function () {
    $session = new Manager();
    $sessionBag = new SessionBag($session, 'user');
    return $sessionBag;
});

$container->set(
    'flashSession',
    function (){
        $customTemplate = '<div class="%cssClass%">
                       <i class="%cssIconClass%"></i>
                       %message%
                       <button type="button" style="float: right;" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';

        $flash = new FlashSession();

        $flash->setCustomTemplate($customTemplate);
        $flash->setCssClasses([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning',
        ]);

        $flash->setCssIconClasses([
            'error'   => 'fas fa-exclamation-triangle',
            'success' => 'fas fa-check-circle',
            'notice'  => 'fas fa-info-circle',
            'warning' => 'fas fa-exclamation-triangle'
        ]);
        return $flash;
    }
);


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
                'password' => '',
                'dbname'   => 'epsilon',
            ]
        );
    }
);

$container->set('dispatcher', function () use ($container) {
    $eventsManager = new EventsManager;
    // Check if the user is allowed to access certain action using the SecurityPlugin
    $eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin);
    // Handle exceptions and not-found exceptions using NotFoundPlugin
    // $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);
    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});

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

/*$container->set('flash', function(){
    $flash = new Flash([
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
    return $flash;
});*/

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
/*$container->set('flashSession', function () {
    return new FlashSession([
        'error'   => 'alert alert-dismissable alert-danger',
        'success' => 'alert alert-dismissable alert-success',
        'notice'  => 'alert alert-dismissable alert-info',
        'warning' => 'alert alert-dismissable alert-warning'
    ]);
});*/

/*$container->set('flashSession', function(){
    return new Phalcon\Flash\Session(array(
      'error' => 'alert alert-dismissable alert-danger',
      'success' => 'alert alert-dismissable alert-success',
      'notice' => 'alert alert-dismissable alert-info',
    ));
  });*/

/*$container->set(
    'flashSession',
    function (){
        $customTemplate = '<div class="%cssClass%">
                       <i class="%iconCssClass%"></i>
                       %message%
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';

        $flash = new FlashSession();

        $flash->setCustomTemplate($customTemplate);
        $flash->setCssClasses([
            'error'   => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice'  => 'alert alert-info',
            'warning' => 'alert alert-warning',
        ]);

        $flash->setIconCssClasses([
            'error'   => 'fas fa-exclamation-triangle',
            'success' => 'fas fa-check-circle',
            'notice'  => 'fas fa-info-circle',
            'warning' => 'fas fa-exclamation-triangle'
        ]);
        return $flash;
    }
);*/
