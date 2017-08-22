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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'Web'], function () {
	return view('welcome');
});

Route::group([ 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::group([ 'middleware' => 'AdminLogin'], function () {
	    Route::get('/', 'DashboardController@index')->name('dashboard.login');
    });
    Route::get('/login', 'LoginController@index')->name('login.login');
    Route::post('/login', 'LoginController@login')->name('login.dologin');
    Route::get('/logout', 'LoginController@logout')->name('login.logout');

    Route::get('/department', 'DepartmentsController@index')->name('department.index');
    Route::resource('/department', 'DepartmentsController');
//Route::get('/department/{$id}', 'DepartmentsController@destroy')->name('department.destroy');

    Route::resource('/service', 'ServicesController');
    Route::resource('/article', 'ArticlesController');


});