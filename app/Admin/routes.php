<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('regist_cast', CastController::class);
    $router->resource('schedule', ScheduleController::class);
    $router->resource('corse', CorseController::class);
    $router->resource('deliveries', DeliveryController::class);
    $router->resource('reserves', ReserveController::class);
    $router->resource('appoint-fees', AppointFeeController::class);
    $router->resource('cast-ranks', CastRankController::class);
    $router->resource('customer', CustomerController::class);

});
