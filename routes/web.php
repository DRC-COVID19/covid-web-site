<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "PageController@index")->name('home');
Route::get('/directives-prises-par-le-gouvernement', "PageController@officialMeasure")->name('officialMeasure');
Route::get('/mesures-de-protection-contre-le-coronavirus', "PageController@preventativeMeasures")->name('preventativeMeasures');
Route::get('/idees-recues-fake-news', "PageController@stereotypes")->name('stereotypes');
Route::get('/sondages', 'PageController@sondage')->name('sondages');
Route::get('/commité-multisectoriel-de-la-riposte', 'PageController@aboutCmr')->name('aboutCmr');

// Route::get('/dashboard-maps/password-reset/{any}','DashBoardController@index')->name('dashboad.password.reset');
Route::get('/dashboard-maps/{any?}','DashBoardController@index')->where('any', '^(?!api.*$).*');

Route::get('/orientation-medicale','SelfTestController@diagnostic')->name('diagnostic');
Route::group(['prefix' => 'orientation-medicale-test'], function () {
    Route::get('/{step}','SelfTestController@back')->name('selfTest.back');
    Route::get('/', 'SelfTestController@seltTest')->name('selfTest.get');
    Route::post('/', 'SelfTestController@storeSelfTest')->name('seltTest.post');
});
