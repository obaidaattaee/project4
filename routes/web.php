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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->namespace('AdminControllers')->group(function (){
    Route::resource('category' , 'CategoriesController');
    Route::get('category/delete/{id}' , 'CategoriesController@destroy')->name('category.destroy');

    Route::resource('news' , 'NewsController');
    Route::get('news/delete/{id}' , 'NewsController@destroy')->name('news.destroy');
});
