<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::middleware('auth:admin')->group(function(){
    Route::get('/', 'HomeController@root')->name('root');
    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::resource('/companies', 'CompaniesController');
    Route::resource('/employee', 'EmployeeController');
});

Route::get('/language', 'LanguageController@change')->name('change.language');


