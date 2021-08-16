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
    Route::get('/admin/', 'Admin\AdminSideController@index')->name('admin');
    Route::get('/admin/notaccepted-orders', 'Admin\AdminOrderController@notAceptedOrders')->name('orders.notaccepted');
    Route::post('/admin/orders/accept/{id}', 'Admin\AdminOrderController@acceptOrder')->name('orders.accept');
    Route::post('/admin/orders/decline/{id}', 'Admin\AdminOrderController@declineOrder')->name('orders.decline');

    Route::resource('admin/orders', 'Admin\AdminOrderController');
    Route::resource('admin/products/electro', 'Admin\AdminProductElectroController');
});
/*
|--------------------------------------------------------------------------
| Authorization Controller Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
