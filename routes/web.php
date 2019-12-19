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

use Kreait\Firebase\Factory;

Route::get('/', function () {


    $database = (new Factory())->createDatabase();

    $rf = ddd($database->getReference('/users/1/name')->set('name'));

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
