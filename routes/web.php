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

  Route::put('ajax/status', ['as' => 'ajax.status', 'uses' => 'AjaxController@status']);

  Route::resource('user', 'UserController');

  Route::resource('slider', 'SliderController');
  Route::resource('category', 'CategoryController');
  Route::resource('page', 'PageController');
  Route::resource('partner', 'PartnerController');
  Route::resource('property', 'PropertyController');
  Route::get('delete/propertyimage/{image}', ['as' => 'property.deleteimage', 'uses' => 'PropertyController@deleteimage']);

  Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
  Route::put('settings/mupdate', ['as' => 'settings.mupdate', 'uses' => 'SettingsController@mupdate']);
});

// Frontend


Auth::routes();


Route::group(['as' => 'frontend', 'namespace' => 'Frontend'], function() {
  Route::get('/', 'HomeController@index');

  Route::get('/category/{slug}', 'CategoryController@show');
  Route::get('/page/{slug}', 'PageController@show');

  Route::get('/contacts', 'ContactController@index');
  Route::get('/property', 'PropertyController@index');
  Route::get('/property/{slug}', 'PropertyController@show');



});

Route::post('/moreinfo', 'FrontendController@moreinfo');
Route::post('/callme', 'FrontendController@callme');


//Image resize on view
Route::get('/resize/{h}/{w}',function($h=200, $w=200){
  $img = Illuminate\Support\Facades\Input::get("img");
  return \Image::make(public_path(urldecode($img)))->resize($h, $w)->response('jpg');
 });