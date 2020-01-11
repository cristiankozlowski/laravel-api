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


Route::group(['namespace' => 'Api'], function() {

    Route::get('/', function() {
        return ['message' => 'Jobs API', 'status' => 'Connected'];
    });

    Route::ApiResource('jobs', 'JobsController');
    Route::ApiResource('companies', 'CompaniesController');
});

