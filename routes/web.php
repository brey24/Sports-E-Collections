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
	Alert::success('Hello');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/cart', 'CartController@delete')->name('cart.delete');

// Route::resource('/categories', 'CategoryController');

Route::resources([
	'categories' => 'CategoryController',
	'products' => 'ProductController',
	'cart' => 'CartController'
]);
