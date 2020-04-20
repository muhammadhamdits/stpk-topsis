<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/alternatif', 'AlternatifController@index')->name('alternatif.index');
Route::post('/alternatif', 'AlternatifController@store')->name('alternatif.store');
Route::post('/alternatif/{alternatif}/destroy', 'AlternatifController@destroy')->name('alternatif.destroy');
Route::post('/alternatif/update', 'AlternatifController@update')->name('alternatif.update');

Route::get('/kriteria', 'KriteriaController@index')->name('kriteria.index');
Route::post('/kriteria', 'KriteriaController@store')->name('kriteria.store');
Route::post('/kriteria/{kriteria}/destroy', 'KriteriaController@destroy')->name('kriteria.destroy');
Route::post('/kriteria/update', 'KriteriaController@update')->name('kriteria.update');
