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
// Route::get('/', function(){
// 	return('<h1>Hello Laravel</h1>');
// });


Route::middleware('role:admin')->group(function () {
	Route:: get('dashboard', 'BackendController@dashboard')->name('dashboard');
	Route:: resource('categories', 'CategoryController');
	Route:: resource('subcategories', 'SubcategoryController');
	Route:: resource('brands', 'BrandController');
	Route:: resource('items', 'ItemController');
});



	Route:: get('/', 'FrontendController@index')->name('mainpage');
	Route::get('shoppingcart', 'FrontendController@cart')->name('shoppingcart');
	Route::get('loginpage', 'FrontendController@login')->name('loginpage');
	Route::get('registerpage', 'FrontendController@register')->name('registerpage');
	Route::get('orderhistory', 'FrontendController@orderhistory')->name('orderhistory');
	Route::get('categoriespage/{id}', 'FrontendController@categories')->name('categoriespage');
	Route:: resource('orders', 'OrderController');
	Route:: get('orders.cancel/{id}', 'OrderController@cancel')->name('cancel');




Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

