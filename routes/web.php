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

Route::get('homepage','App\Http\Controllers\UserController@index')->name('homepage');
//portfolio page
Route::get('portfolio','App\Http\Controllers\UserController@portfolio')->name('portfolio');
//Contact Page
Route::get('contact','App\Http\Controllers\UserController@contact')->name('contact');
//About Page
Route::get('about','App\Http\Controllers\UserController@about')->name('about');
//services page
Route::get('services','App\Http\Controllers\UserController@services')->name('services');
//pricing page
Route::get('pricing','App\Http\Controllers\UserController@pricing')->name('pricing');
//team page
Route::get('team','App\Http\Controllers\UserController@team')->name('team');
//blog page
Route::get('blog','App\Http\Controllers\UserController@blog')->name('blog');

