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

/*
|--------------------------------------------------------------------------
| Client Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'ClientSideController@index');

/*
|--------------------------------------------------------------------------
| Admin Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/', 'AdminSideController@index');

/*
|--------------------------------------------------------------------------
| Authorization Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/login/', 'AuthorizationController@login');
Route::get('/register/', 'AuthorizationController@register');
