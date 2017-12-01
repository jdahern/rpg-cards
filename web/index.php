<?php
$container = require __DIR__ . '/../src/bootstrap.php';
use FastRoute\RouteCollector;
use OpenDungeon\Controller\HomeController;
use OpenDungeon\Controller\ArticleController;

new HomeController();
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', HomeController::CLASS);
    $r->addRoute('GET', '/article/{id}', [ArticleController::CLASS, 'show']);
});
$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = $route[2];
        // We could do $container->get($controller) but $container->call()
        // does that automatically
        $container->call($controller, $parameters);
        break;
}