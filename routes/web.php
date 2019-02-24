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

//Front Site
Route::get('/', 'FrontController@home');
Route::get('/about', 'FrontController@about');

//Charts
Route::get('/charts', 'ChartController@index');
Route::post('/charts/search', 'ChartController@searchChart');
Route::get('/charts/afd', 'ChartController@AFDindex');
Route::post('/charts/afd/search', 'ChartController@searchAFD');
Route::get('/charts/changes', 'ChartController@ChartChangeindex');
Route::post('/charts/changes/search', 'ChartController@searchChartChange');

//Airport Information
Route::get('/airport-info', 'AirportInfoController@index');
Route::post('/airport-info/search', 'AirportInfoController@search');

//Weather
Route::get('/weather', 'WeatherController@index');
Route::post('/weather/search', 'WeatherController@searchAirport');

//VATSIM
Route::get('/vatsim/pilots', 'VatsimController@pilotsIndex');
Route::post('/vatsim/pilots/search', 'VatsimController@searchPilots');
Route::get('/vatsim/controllers', 'VatsimController@controllersIndex');
Route::post('/vatsim/controllers/search', 'VatsimController@searchControllers');
