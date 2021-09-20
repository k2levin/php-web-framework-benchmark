<?php

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/api/healthz', 'App\Http\Controllers\HomeController@getHealthz');
Route::get('/api/user/{id}', 'App\Http\Controllers\HomeController@getUser');
