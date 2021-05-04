<?php

use Illuminate\Auth\AuthServiceProvider;
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

// =============== ADMIN ===========================
Route::get('/admin', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');


//  ============== CUSTOMERS ===========================
Route::get('/admin/customers/index', 'CustomerController@index')->name('customer.index');
Route::get('/admin/customers/detail/{id}', 'CustomerController@detail')->name('customer.detail');
Route::get('/admin/customers/delete/{id}', 'CustomerController@delete')->name('customer.delete');
Route::get('/admin/customers/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('/admin/customers/update/{id}', 'CustomerController@update')->name('customer.update');
Route::get('/admin/customers/create', 'CustomerController@create')->name('customer.create');
Route::post('/admin/customers/store', 'CustomerController@store')->name('customer.store');


//  ============== CATEGORY ===========================
Route::get('/admin/categories/index', 'CategoryController@index')->name('category.index');
Route::get('/admin/categories/create', 'CategoryController@create')->name('category.create');
Route::post('/admin/categories/store', 'CategoryController@store')->name('category.store');
Route::get('/admin/categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::get('/admin/categories/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/admin/categories/update/{id}', 'CategoryController@update')->name('category.update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
