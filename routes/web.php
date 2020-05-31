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

Route::get('/', 'PartController@index')->name('app.index'); //homeページ
Route::get('/parts', 'PartController@parts')->name('parts.list'); //パーツ一覧ページ
Route::get('/spends', 'PartController@spends')->name('spends.list'); //パーツ支出一覧ページ
Route::get('/newp', 'PartController@pcreate')->name('parts.new'); //パーツ登録フォーム
Route::get('/news', 'PartController@screate')->name('spends.new'); //パーツ支出記録フォーム