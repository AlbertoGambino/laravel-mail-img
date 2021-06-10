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

Route::get('/', 'GuestController@home')
    ->name('home');

Route::get('/car/create' , 'HomeController@createCar')
    -> name('create-car');

Route::post('car/store', 'HomeController@storeCar')
    -> name('store-car');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('logged');
