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
Route::get('/parts/edit', 'PartController@edit')->name('parts.edit')->middleware('auth'); //パーツ情報編集
Route::post('/parts/edit', 'PartController@update')->name('parts.update')->middleware('auth'); //パーツ情報編集保存
Route::get('/parts/delete', 'PartController@delete')->name('parts.delete')->middleware('auth'); //パーツ情報削除
Route::get('/parts/search', 'PartController@parts')->name('parts.search')->middleware('auth'); //パーツ一覧検索

Route::get('/spends', 'SpendController@spends')->name('spends.list')->middleware('auth'); //パーツ支出一覧ページ
Route::get('/news', 'SpendController@create')->name('spends.new')->middleware('auth'); //パーツ支出記録フォーム
Route::post('/spends', 'SpendController@store')->name('spend.store')->middleware('auth'); //パーツ登録保存
Route::get('/spends/delete', 'SpendController@delete')->name('spends.delete')->middleware('auth'); //パーツ情報削除

Route::get('/genrus', 'GenruController@genrus')->name('genrus.list')->middleware('auth'); //ジャンル一覧ページ
Route::get('/genrus/edit', 'GenruController@edit')->name('genrus.edit')->middleware('auth'); //パーツ情報編集
Route::post('/genrus/edit', 'GenruController@update')->name('genrus.update')->middleware('auth'); //パーツ情報編集保存
Route::get('/genrus/delete', 'GenruController@delete')->name('Genrus.delete')->middleware('auth'); //パーツ情報削除


Route::get('/cost', 'CostController@index')->name('cost')->middleware('auth'); //原価計算ページ
Route::post('/cost', 'CostController@calc')->name('cost.sum')->middleware('auth'); //原価計算ページ、「計算」ボタンクリック後

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/howto', 'HomeController@howto')->name('howto');

