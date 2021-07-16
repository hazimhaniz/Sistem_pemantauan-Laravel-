<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('getData', 'API\DatabaseController@projekAPI');

Route::get('test', function()
{
	echo "executed success!";
});
Route::post('login', 'API\AuthController@login');
Route::post('login2', 'API\DatabaseController@projekAPI');
Route::post('register', 'API\AuthController@register');
Route::post('registerexist', 'API\AuthController@registerexist')->name('registerexist');


Route::post('forgot', 'API\AuthController@forgot');

Route::middleware('auth:api')->group(function () {
	Route::post('database', 'API\DatabaseController@index');
});

Route::get('external/projek/projekList', 'ProjekController@getProjekDetail');
Route::post('external/projek/daftar_projek', 'ProjekController@addProjekDetail');
Route::get('rest_api', 'ProjekController@getApi');

Route::get('speiatoesdr','API\SpeiaController@speiaApi');
Route::post('insertIntergration','API\SpeiaController@insertMaklumatStesen');

Route::group(['prefix' => 'master-sungai'], function () {
	Route::get('get-rivers', 'API\MasterSungaiAPIController@getRivers')->name('api.master.parameter1.rivers');
});

Route::group(['prefix' => 'summary-history'], function () {
	Route::get('append-label/{id}', 'API\SummaryHistoryController@appendLabel')->name('api.summary.history.append.label');
});

Route::resources([
	'master-sungai' => 'API\MasterSungaiAPIController',
	'summary-history' => 'API\SummaryHistoryController'
]);