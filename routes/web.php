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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
  });

Route::get('/roles/all','Auth\RegisterController@getRoles');
Route::resource('/roles','RolesController');
Route::resource('/users','UsersController');
Route::resource('/worksheets','WorksheetsController');
Route::resource('/letters','LettersController');
Route::resource('/inwards','InwardsController');
Route::resource('/outwards','OutwardsController');
Route::resource('/pra','PRAsController');
Route::resource('/prb','PRBsController');
Route::resource('/reports','ReportsController');