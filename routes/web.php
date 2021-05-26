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

use App\Http\Controllers\CollectionController;

Route::get('/', function () {
    return view('welcome');
});

// rotas para combox - ajax-dynamic-dependent-dropdown-in-laravel
Route::get('/dynamic_dependent', 'DynamicDependent@index');
Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');

Route::get('teste', 'CollectionController@index');
Route::get('loop', 'CollectionController@loop');
Route::get('teste2', 'CollectionController@teste2');
Route::get('teste3', 'CollectionController@teste3');
Route::get('teste4', 'CollectionController@teste4');
Route::get('teste5', 'CollectionController@debugging');
Route::get('teste6', 'CollectionController@has');
Route::get('teste7', 'CollectionController@implode');
Route::get('teste8', 'CollectionController@implod');
Route::get('teste9', 'CollectionController@push');
Route::get('teste10', 'CollectionController@pull');
Route::get('teste11', 'CollectionController@shuffle');
