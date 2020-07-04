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

Route::get('/parts', 'PartController@parts')->name('parts.list')->middleware('auth'); //パーツ一覧ページ
Route::get('/newp', 'PartController@create')->name('parts.new')->middleware('auth'); //パーツ登録フォーム
Route::post('/parts', 'PartController@store')->name('parts.store')->middleware('auth'); //パーツ登録保存
Route::get('/parts/edit/', 'PartController@edit')->name('parts.edit')->middleware('auth'); //パーツ情報編集
Route::post('/parts/edit', 'PartController@update')->name('parts.update')->middleware('auth'); //パーツ情報編集保存
Route::get('/parts/delete', 'PartController@delete')->name('parts.delete')->middleware('auth'); //パーツ情報削除

Route::get('/spends', 'SpendController@spends')->name('spends.list')->middleware('auth'); //パーツ支出一覧ページ
Route::get('/news', 'SpendController@create')->name('spends.new')->middleware('auth'); //パーツ支出記録フォーム
Route::post('/spends', 'SpendController@store')->name('spend.store')->middleware('auth'); //パーツ登録保存
Route::get('/spends/delete', 'SpendController@delete')->name('spends.delete')->middleware('auth'); //パーツ情報削除

Route::get('/genka', 'GenkaController@index')->name('genka')->middleware('auth'); //原価計算ページ
Route::post('/genka', 'GenkaController@store')->name('genka.store')->middleware('auth'); //原価計算ページ、「計算」ボタンクリック後


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

