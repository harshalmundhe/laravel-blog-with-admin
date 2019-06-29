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

/*
* Route::get('/', function () {
        return view("index");
   });
   
   Route::get('/', function () {
        return '<h1>INDEX</h1>';
   });
*
*
*  Route::get('/user/{id}/{name}', function ($id,$name) {
        return "USER ".$id." name ".$name;
   });
*
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/myaccount', 'UserAccountController@index');
Route::get('/settings', 'SettingsController@index');
Route::post('/update', 'SettingsController@update');
Route::get('/dashboard', 'DashboardController@index');

Route::resource('posts','PostsController');
Route::post('/CommentController/store', 'CommentController@store');

Route::get('/ajaxRequest/{function}', 'AjaxController@index');
Route::get('/tag/{id}', 'TagController@showPost');
Route::get('/profile/{id}', 'UserAccountController@showPublicProfile');
Route::get('/category/{id}', 'CategoryController@showPost');
Route::get('/archieve/{year}', 'PostsController@showArchievePost');
Route::post('/search', 'PostsController@searchPost');

Auth::routes();
Auth::routes(['verify' => true]);


Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');

});


Route::get('/home', 'HomeController@index')->name('home');
