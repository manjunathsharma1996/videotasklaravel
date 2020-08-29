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
Route::get('/roles', 'PermissionController@Permission');
Route::get('/manage-roles', 'ManageRolesController@index');
Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::post('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('add-video', 'VideoController@add');
Route::get('videos', 'VideoController@show');
Route::get('users', 'UserController@show');
Route::post('create-video', 'VideoController@create');
Route::get('/videos/{video}/edit', 'VideoController@edit');
Route::post('/videos/{video}', 'VideoController@update');
Route::get('/destroy/{id}', 'UserController@destroy');
Route::get('/delvideo/{id}', 'VideoController@delVideo');