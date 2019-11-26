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
    return view('dane');
});

Auth::routes();

Route::get('/dane', 'DaneController@index');
Route::get('/dane/person/{id}', 'DaneController@person')->name('person');
Route::get('/dane/dodano_2019', 'DaneController@dodane_2019')->name('dodano_2019');
Route::get('/dane/dodano_2020', 'DaneController@dodane_2020')->name('dodano_2020');
Route::get('/dane/zaplacone', 'DaneController@zaplacone')->name('zaplacone');
Route::post('/add','DaneController@add')->name('add');
Route::post('/dane/ajax','DaneController@edit');