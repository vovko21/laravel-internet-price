<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminOrderController;

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
/* Core */
Route::get('/', 'ClientSideController@index')->name('home');
Route::get('/products', 'ClientSideController@allProducts')->name('all.products');

/* View */
Route::get('/view/{id}', 'ClientSideController@view')->name('view');

/* Cart */
Route::get('/cart', 'CartController@cart')->name('cart');
Route::post('/cart/add/{product}', 'CartController@cartAdd')->name('cart-add');
Route::post('/cart/remove/{product}', 'CartController@cartRemove')->name('cart-remove');
Route::post('/cart/removefull/{product}', 'CartController@cartFullRemove')->name('cart-full-remove');
Route::post('/cart/quantity/{id}/{quantity}', 'CartController@cartQuantity')->name('cart-quantity');
Route::get('/cart/confirmation', 'CartController@cartConfirmation')->name('cart-confirmation');
Route::post('/cart/confirm', 'CartController@cartConfirm')->name('cart-confirm');

/* Orders */
Route::get('/orders', 'OrdersController@index')->name('orders');

/* Account */
Route::middleware('auth')->get('/account/notifications', 'Auth\AccountController@notifications')->name('account.notifications');

/*
|--------------------------------------------------------------------------
| Admin Controller Routes
|--------------------------------------------------------------------------
*/
Route::middleware('check_role')->group(function () {
    /* Core */
    Route::get('/admin', 'Admin\AdminSideController@index')->name('admin');

    /* Orders */
    Route::get('/admin/notaccepted-orders', 'Admin\AdminOrderController@notAceptedOrders')->name('orders.notaccepted');
    Route::post('/admin/orders/accept/{id}', 'Admin\AdminOrderController@acceptOrder')->name('orders.accept');
    Route::post('/admin/orders/decline/{id}', 'Admin\AdminOrderController@declineOrder')->name('orders.decline');
    Route::resource('admin/orders', 'Admin\AdminOrderController');

    /* ProductsElectro */
    Route::resource('admin/products/electro', 'Admin\AdminProductElectroController');
});
/*
|--------------------------------------------------------------------------
| Authorization Controller Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
