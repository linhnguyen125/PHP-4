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
    return view('welcome');
});

// =============== ADMIN ===========================
Route::get('/admin', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');


//  ============== CUSTOMERS ===========================
Route::get('/admin/customers/index', 'CustomerController@index')->name('customer.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
