<?php
require "./Route.php";
require "./RouteRegistrar.php";
require "./Router.php";
try {
    Router::where('name', '[a-z]+')
        ->where('id', '\d{1,2}')
        ->prefix("admin")
        ->namespace("Admin\\Controller")
        ->group(function (Router $router) {
            Router::get('dashboard', 'DashboardController@index');
//            Router::prefix("order")
//                ->group(function () {
//                    Router::post('add', 'OrderController@add');
//                    Router::post('index', 'OrderController/index');
//                });
        })
    ;

    /**
     * @var  $item Route
     * **/
    foreach (Router::getInstance()->getRouteCollection() as $item) {
        echo $item->getRule() . '->' . $item->getAction() . "\n";
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}

