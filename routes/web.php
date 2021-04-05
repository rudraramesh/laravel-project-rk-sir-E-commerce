<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


//user page
Route::get('/homepage','App\Http\Controllers\UserController@index')->name('homepage');
//portfolio page
Route::get('/product','App\Http\Controllers\UserController@product')->name('product');
//Contact Page
Route::get('/contact','App\Http\Controllers\UserController@contact')->name('contact');
//About Page
Route::get('about','App\Http\Controllers\UserController@about')->name('about');
//services page
Route::get('/services','App\Http\Controllers\UserController@services')->name('services');
//pricing page
Route::get('/pricing','App\Http\Controllers\UserController@pricing')->name('pricing');
//team page
Route::get('/team','App\Http\Controllers\UserController@team')->name('team');
//blog page
Route::get('/blog','App\Http\Controllers\UserController@blog')->name('blog');

//user send message
Route::post('/storemessage','App\Http\Controllers\UserController@storemessage')->name('storemessage');
//user login
Route::get('/userregister','App\Http\Controllers\UserController@userregister')->name('userregister');
Route::post('/storeregister','App\Http\Controllers\UserController@storeregister')->name('storeregister');
Route::get('/userlogins','App\Http\Controllers\UserController@userlogins')->name('userlogins');
//product details
Route::get('/productdetails/{id}','App\Http\Controllers\UserController@productdetails')->name('productdetails');
// product comment
Route::post('storeproductcomment','App\Http\Controllers\UserController@storeproductcomment')->name('storeproductcomment');
//show comment
Route::get('/showcomment','App\Http\Controllers\UserController@showcomment')->name('showcomment');
// search result
Route::get('/searchresult','App\Http\Controllers\UserController@search')->name('searchproduct');
// my profile
Route::get('/myprofile','App\Http\Controllers\UserController@myprofile')->name('myprofile');
//edit profile
Route::get('/editprofile/{id}','App\Http\Controllers\UserController@editprofile')->name('editprofile');
//update profile
Route::post('/updateprofile/{id}','App\Http\Controllers\UserController@updateprofile')->name('updateprofile');
//show profile
Route::get('/showprofile','App\Http\Controllers\UserController@showprofile')->name('showprofile');
Route::get('/productbycategory/{id}','App\Http\Controllers\UserController@productbycategory')->name('productbycategory');









// admin page 
Route::get('/admin/home','App\Http\Controllers\AdminController@index')->name('admin.home');

//admin add category
Route::get('/admin/addcategory','App\Http\Controllers\AdminController@addcategory')->name('admin.addcategory');

Route::post('/admin/storecategory','App\Http\Controllers\AdminController@store')->name('admin.storecategory');

Route::get('/admin/addcategory','App\Http\Controllers\AdminController@show')->name('admin.addcategory');

Route::get('/admin/deletecategory/{id}','App\Http\Controllers\AdminController@destroy')->name('admin.deletecategory');


Route::get('/admin/editcategory/{id}','App\Http\Controllers\AdminController@edit')->name('admin.editcategory');

Route::post('/admin/updatecategory/{id}','App\Http\Controllers\AdminController@update')->name('admin.updatecategory');

//admin add product
Route::get('/admin/addproduct','App\Http\Controllers\AdminController@addproduct')->name('admin.addproduct');

Route::post('/admin/storeproduct','App\Http\Controllers\AdminController@storeproduct')->name('admin.storeproduct');

Route::get('/admin/showproduct','App\Http\Controllers\AdminController@showproduct')->name('admin.showproduct');
//edit product

Route::get('/admin/editproduct/{id}','App\Http\Controllers\AdminController@editproduct')->name('admin.editproduct');
//update product

Route::post('/admin/updateproduct/{id}','App\Http\Controllers\AdminController@updateproduct')->name('admin.updateproduct');
//delete product
Route::get('/admin/deleteproduct/{id}','App\Http\Controllers\AdminController@destroyproduct')->name('admin.deleteproduct');
//SHOW USER MESSAGE
Route::get('/admin/usersendmessage','App\Http\Controllers\AdminController@usersendmessage')->name('admin.usersendmessage');
//add tags
Route::get('/admin/addtags','App\Http\Controllers\AdminController@addtags')->name('admin.addtags');

//store tags
Route::post('/admin/storetags','App\Http\Controllers\AdminController@storetags')->name('admin.storetags');
//after add product
Route::get('/admin/afteraddproduct','App\Http\Controllers\AdminController@afteraddproduct')->name('admin.afteraddproduct');
//store add product
Route::post('/admin/storeafteraddproduct','App\Http\Controllers\AdminController@storeafteraddproduct')->name('admin.storeafteraddproduct');


