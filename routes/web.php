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

Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::route('location.day');
})->name('index');

/* Localização */
Route::get('location/day', 'VehicleController@indexDay')->name('view.location.day');
Route::post('location/day', 'VehicleController@getDay')->name('location.day');

/* Relatórios */
Route::get('report/points', 'ReportController@indexPoints')->name('view.report.points');
Route::post('report/points', 'ReportController@getPoints')->name('report.points');
Route::get('report/displacements', 'ReportController@indexDisplacements')->name('view.report.displacements');
Route::post('report/displacements', 'ReportController@getDisplacements')->name('report.displacements');


Route::resource('vehicle', 'VehicleController');


