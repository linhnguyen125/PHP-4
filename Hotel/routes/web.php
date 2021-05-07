<?php

use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Support\Facades\Auth;
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


// =================================================
// =============== ADMIN ===========================
// =================================================


Route::get('/admin', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');


//  ============== CUSTOMERS ===========================
Route::get('/admin/customers/index.html', 'CustomerController@index')->name('customer.index');
Route::get('/admin/customers/detail/{id}.html', 'CustomerController@detail')->name('customer.detail');
Route::get('/admin/customers/delete/{id}', 'CustomerController@delete')->name('customer.delete');
Route::get('/admin/customers/edit/{id}.html', 'CustomerController@edit')->name('customer.edit');
Route::post('/admin/customers/update/{id}', 'CustomerController@update')->name('customer.update');
Route::get('/admin/customers/create.html', 'CustomerController@create')->name('customer.create');
Route::post('/admin/customers/store', 'CustomerController@store')->name('customer.store');


//  ============== CATEGORY ===========================
Route::get('/admin/categories/index.html', 'CategoryController@index')->name('category.index');
Route::get('/admin/categories/create.html', 'CategoryController@create')->name('category.create');
Route::post('/admin/categories/store', 'CategoryController@store')->name('category.store');
Route::get('/admin/categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::get('/admin/categories/edit/{id}.html', 'CategoryController@edit')->name('category.edit');
Route::post('/admin/categories/update/{id}', 'CategoryController@update')->name('category.update');


//  ============== ROOM ===========================
Route::get('/admin/rooms/index.html', 'RoomController@index')->name('room.index');
Route::get('/admin/rooms/create.html', 'RoomController@create')->name('room.create');
Route::post('/admin/rooms/store', 'RoomController@store')->name('room.store');
Route::get('/admin/rooms/detail/{id}.html', 'RoomController@detail')->name('room.detail');
Route::get('/admin/rooms/delete/{id}', 'RoomController@delete')->name('room.delete');
Route::get('/admin/rooms/edit/{id}.html', 'RoomController@edit')->name('room.edit');
Route::post('/admin/rooms/update/{id}', 'RoomController@update')->name('room.update');


// =================================================
// =============== CLIENT ==========================
// =================================================


// =============== SITE ============================
Route::get('/', 'SiteController@index')->name('site.index');

// ------------ Chi tiết phòng ---------------------
Route::get('/room-overview/{slug}_{id}.html', 'SiteController@overview')->name('room.overview');

// ------------ Danh mục phòng --------------------- 
Route::get('/danh-muc/{slug}_{id}.html', 'SiteController@showCategory')->name('category.list');

// ------------ Đặt phòng --------------------------
Route::get('/booking/{id}', 'BookingController@booking')->name('booking');
Route::post('/checkout/{id}', 'BookingController@checkout')->name('checkout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
