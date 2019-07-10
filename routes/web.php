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
    return view('layouts.global');
});

//Nomor 1
Route::get('/nomor1', 'ActionController@nomor1')->name('nomor1');
Route::post('/nomor1/add', 'ActionController@nomor1add')->name('nomor1.add');
Route::get('/nomor1/get/{id}', 'ActionController@nomor1get')->name('nomor1.get');
Route::post('/nomor1/update', 'ActionController@nomor1update')->name('nomor1.update');

//Nomor 2
Route::get('/nomor2', 'ActionController@nomor2')->name('nomor2');
Route::post('/nomor2/add', 'ActionController@nomor2add')->name('nomor2.add');
Route::get('/nomor2/get/{id}', 'ActionController@nomor2get')->name('nomor2.get');
Route::post('/nomor2/update', 'ActionController@nomor2update')->name('nomor2.update');

//Nomor 3
Route::get('/nomor3', 'ActionController@nomor3')->name('nomor3');
Route::post('/nomor3/kirim', 'ActionController@nomor3kirim')->name('nomor3.kirim');


//Nomor 4
Route::get('/nomor4', 'ActionController@nomor4')->name('nomor4');
Route::post('/nomor4/kirim', 'ActionController@nomor4kirim')->name('nomor4.kirim');

//Nomor 5
Route::get('/nomor5', 'ActionController@nomor5')->name('nomor5');
Route::post('/nomor5/hitung', 'ActionController@nomor5hitung')->name('nomor5.hitung');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
