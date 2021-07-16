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

// Route::get('/', function () {
//     return view('welcome');
// });


//admin route
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

// customer route
Route::get('/login/customer', 'CustomerController@showLoginForm')->name('showlogin');
Route::get('/register/customer', 'CustomerController@showRegisterForm');
Route::post('/login/customer', 'CustomerController@customerLogin');
Route::post('/register/customer', 'CustomerController@createCustomer');
Route::get('/logout', 'CustomerController@logout');



//frontend route
Route::get('/','FrontEndController@index');
Route::resource('/admin','AdminHomeController');
Route::resource('/food','FoodController');
Route::get('/foodsearch','FoodController@search');

Route::get('/about','FrontEndController@about');
Route::get('/viewprod/{id}','FrontEndController@viewProduct');
Route::get('/checkout','FrontEndController@checkout');
Route::post('/order/{id}','FrontEndController@saveOrder');

//cartcontroller route
Route::get('/addtocart/{id}','CartController@index');
Route::get('/cart','CartController@show')->name('cartshow');
Route::delete('/removecart','CartController@remove');
Route::patch('/updatecart','CartController@update');


Auth::routes();



// Route::group(['middleware' => 'auth:customer'], function () {
//     Auth::routes();
//     Route::view('/customer', 'frontend.home');
//     // Route::get('/customer','FrontEndController@index');
   
// });

//backend route
Route::group(['middleware' => 'auth:admin'], function () {
    Auth::routes();
    Route::view('/admin', 'adminhome');
    Route::resource('/admin','AdminHomeController');

    Route::resource('/items','ItemController');
    Route::get('/itemsearch','ItemController@search');

    Route::resource('/categories','CategoryController');
    Route::get('/categorysearch','CategoryController@search');

    Route::resource('/adminshow','AdminController');
    Route::get('/adminregister', 'AdminController@showRegisterForm');
    Route::post('/adminregister','AdminController@createAdmin');

    Route::get('/showcustomer','CustomerController@show');
    Route::delete('/deletecustomer/{id}','CustomerController@destroy');
    Route::get('/customersearch','CustomerController@search');

    Route::get('/showorder','OrderController@show');
    Route::get('/vieworderlist/{id}','OrderController@viewOrder');
    Route::delete('/deleteorder/{id}','OrderController@destroy');
    Route::get('/ordersearch','OrderController@searchOrder');

});

Route::get('/home', 'HomeController@index')->name('home');
