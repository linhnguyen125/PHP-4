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

//  ============== STAFF ===========================
Route::get('/admin/staff/index', 'StaffController@index')->name('staff.index');
Route::get('/admin/staff/detail/{id}', 'StaffController@detail')->name('staff.detail');
Route::get('/admin/staff/delete/{id}', 'StaffController@delete')->name('staff.delete');
Route::get('/admin/staff/edit/{id}', 'StaffController@edit')->name('staff.edit');
Route::post('/admin/staff/store/{id}', 'StaffController@store')->name('staff.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
