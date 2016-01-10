<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'Controller@index');
$app->get('/annotation/search', 'ApiController@search');
$app->post('/annotation/store', 'ApiController@store');
$app->put('/annotation/update/{id}', 'ApiController@update');
$app->delete('/annotation/delete/{id}', 'ApiController@delete');
