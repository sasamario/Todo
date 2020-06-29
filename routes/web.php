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

Route::get('/', 'TaskController@index')->name('todo');
Route::post('/add', 'TaskController@add')->name('add');

//タスク更新
Route::get('/edit/{task_id}', 'TaskController@edit')->name('edit');
Route::post('/edit/{task_id}', 'TaskController@update')->name('updateTask');

//タスク完了
Route::get('/update/{task_id}', 'TaskController@change')->name('updateStatus');

//タスク削除
Route::get('/delete/{task_id}', 'TaskController@delete')->name('delete');

//タスク検索
Route::get('/search', 'TaskController@search')->name('search');
