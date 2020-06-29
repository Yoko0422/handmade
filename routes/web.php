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
Route::get('/newp', 'PartController@create')->name('parts.new'); //パーツ登録フォーム
Route::post('/parts', 'PartController@store')->name('parts.store'); //パーツ登録保存
Route::get('/parts/edit/', 'PartController@edit')->name('parts.edit'); //パーツ情報編集
Route::post('/parts/edit', 'PartController@update')->name('parts.update'); //パーツ情報編集保存
Route::get('/parts/delete', 'PartController@delete')->name('parts.delete'); //パーツ情報削除

Route::get('/spends', 'SpendController@spends')->name('spends.list'); //パーツ支出一覧ページ
Route::get('/news', 'SpendController@create')->name('spends.new'); //パーツ支出記録フォーム
Route::post('/spends', 'SpendController@store')->name('spend.store'); //パーツ登録保存

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
