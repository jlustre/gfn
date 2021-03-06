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

//This will make only admin users to access the admin pages
Route::group(['middleware'=>'admin'], function(){
	Route::resource('admin/users', 'AdminUsersController');
	Route::get('/admin/enagic/accounts', 'AdminEnagicAccountsController@index');
});

Route::resource('api/todos', 'TodosController');
Route::resource('api/prospects', 'ProspectsController');
Route::resource('api/enagicUserAccounts', 'EnagicAccountsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'ProfileController@show');
Route::get('/manage/todo', 'TodosManagerController@index');
Route::get('/manage/prospect', 'ProspectsManagerController@index');

