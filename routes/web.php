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

Route::get('/', 'HomeController@index')->name('home');
Route::get('pegawai', 'PegawaiController@index')->name('pegawai.index');
Route::get('pegawai/create', 'PegawaiController@create')->name('pegawai.create');
Route::post('pegawai/create', 'PegawaiController@store')->name('pegawai.create');
Route::get('pegawai/{pegawai}', 'PegawaiController@show')->name('pegawai.show');
Route::get('pegawai/{pegawai}/hitung', 'PegawaiController@hitung')->name('pegawai.hitung');
Route::post('pegawai/{pegawai}/delete', 'PegawaiController@destroy')->name('pegawai.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('ajax')->namespace('Ajax')->name('ajax.')->group(function() {
    Route::get('pegawai', 'PegawaiController@index')->name('pegawai.index');
    Route::get('pegawai/{pegawai}', 'PegawaiController@show')->name('pegawai.show');
    Route::get('pegawai/{pegawai}/hitung', 'PegawaiController@hitung')->name('pegawai.hitung');
});

