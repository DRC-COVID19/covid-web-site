<?php

use App\Admin\Controllers\AlertController;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\DiagnosticController;
use App\Admin\Controllers\PostController;
use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();
Route::resource('admin/auth/users', UserController::class)->middleware(config('admin.route.middleware'));

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    Route::get('/dashboard-maps', 'DashBoardController@index')->name('dashboard');
    Route::get('/situation-journalier',
        'HospitalSituationController@journalier')->name('situation_journalier');
    Route::get('/situation-journalier/{situation}',
        'HospitalSituationController@journalier_show')->name('situation_journalier.show');
    $router->resource('posts', "PostController");
    $router->resource('alerts', "AlertController");
    $router->resource('categories', "CategoryController");
    $router->resource('sms-diffusions', "SmsDiffusionController");
    $router->resource('provinces', "ProvinceController");
    // $router->resource('pandemic-stats', "PandemicStatController");
    // $router->resource('diagnostics', "DiagnosticController");
    // $router->resource('hospitals', "HospitalController");
    // $router->resource('hospital-situations', "HospitalSituationController");
    // $router->resource('pandemics', "PandemicController");
    // $router->resource('health-zones', "HealthZoneController");
});
