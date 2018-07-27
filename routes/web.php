<?php

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

/* Index Routes [GET] */
Route::get('/', 'IndexController@getData'); //Retorna Index View e os Dados!

Route::get('/post/{id}', 'IndexController@showPost')->where('id', '[0-9]+'); //Chama a view de posts com seu respectivo Post!

Route::get('/status/boss', 'StatusController@getDataBoss')->name('status.boss');// Chama a view de Status/Boss com seus respectivos dados




Route::get('/dashboard/posts/novo', 'DashController@novoPost');
Route::post('/dashboard/posts/adiciona', 'DashController@sendData');


/* Sistema de Login e Autenticação */

Route::group(['middleware' => 'accounts'], function()
{
	/* Grupo de Urls com AccessLevel = 7 */
	Route::group(['middleware' => 'protectsystem'], function (){
		
		Route::get('/dashboard', 'DashController@showDash');
		Route::get('/dashboard/posts/novo', 'DashController@novoPost');
		


	});


	/* Routes [GET] */
	Route::get('/login', 'Auth\LoginController@fmrLogin');
	Route::get('/logout', 'Auth\LoginController@logout');

	/* Routes [POST] */
	Route::post('/login', 'Auth\LoginController@cLogin')->name('login');
});