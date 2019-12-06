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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//增（create）
Route::post('/projects', 'ProjectsController@store')->name('projects.store');
//删（delete)
Route::delete('projects/{project}','ProjectsController@destroy')->name('projects.destroy');
//改(update)
Route::patch('projects/{project}','ProjectsController@update')->name('projects.update');
//查(show/read)
Route::get('/projects','ProjectsController@index');
Route::get('/', 'ProjectsController@index');
Route::get('projects/{project}','ProjectsController@show')->name('projects.show');

Route::resource('tasks','TasksController');
Route::post('tasks/{id}/check','TasksController@check')->name('tasks.check');