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
    return view('welcome');
});

Route::post('/division-store', 'DivisionController@divisionStore')->name('division');
Route::post('/distric-store', 'DivisionController@districStore')->name('distric');

Route::get('/test/{id}', 'DivisionController@test')->name('test');

Route::get('ajaxDistricList', 'DivisionController@ajaxDistricList')->name('ajaxDistricList');
Route::get('ajaxUpazilaList', 'DivisionController@ajaxUpazilaList')->name('ajaxUpazilaList');
Route::get('ajaxUnionList', 'DivisionController@ajaxUnionList')->name('ajaxUnionList');
Route::get('ajaxUnionList', 'DivisionController@ajaxUnionList')->name('ajaxUnionList');
