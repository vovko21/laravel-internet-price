<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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

/*
|--------------------------------------------------------------------------
| Client Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'ClientSideController@index')->name('home');
Route::get('/view/{id}', 'ClientSideController@view')->name('view');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add/{id}', 'CartController@cartAdd')->name('cart-add');
Route::post('/cart/remove/{id}', 'CartController@cartRemove')->name('cart-remove');
Route::post('/cart/quantity/{id}/{quantity}', 'CartController@cartQuantity')->name('cart-quantity');
Route::get('/cart/confirmation', 'CartController@cartConfirmation')->name('cart-confirmation');
Route::post('/cart/confirm', 'CartController@cartConfirm')->name('cart-confirm');

/*
|--------------------------------------------------------------------------
| Admin Controller Routes
|--------------------------------------------------------------------------
*/
Route::middleware('check_role')->group(function () {
    Route::get('/admin/', 'AdminSideController@index')->name('admin');;
});
/*
|--------------------------------------------------------------------------
| Authorization Controller Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
