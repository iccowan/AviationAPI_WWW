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

Route::get('/', 'FrontController@home');

//Charts
Route::get('/charts', 'ChartController@index');
Route::post('/charts/search', 'ChartController@searchChart');
Route::get('/charts/afd', 'ChartController@AFDindex');
Route::post('/charts/afd/search', 'ChartController@searchAFD');
Route::get('/charts/changes', 'ChartController@ChartChangeindex');
Route::post('/charts/changes/search', 'ChartController@searchChartChange');

//Weather
Route::get('/weather', 'WeatherController@index');
Route::post('/weather/search', 'WeatherController@searchAirport');
