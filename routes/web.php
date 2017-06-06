<?php

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

// Admin

Route::get('admin', function () {
  return redirect('admin/dashboard');
});

Route::group(['as' => 'admin.', 'middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
  App::setLocale('ua');
    // Dashboard
  Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
});

// Frontend

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
