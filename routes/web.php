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

//アプリを使用するユーザー用
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    //カレンダー作成用
    Route::resource('calendar', 'Admin\CalendarController');

    //記録用のコントローラー
    Route::post('record/{calendarId}', 'RecordController@record')->name('record.calendar');
    Route::resource('record', 'RecordController')->only([
        'store', 'edit', 'update', 'destroy'
    ]);
});

Auth::routes();
//LP
Route::get('/', 'Auth\LoginController@index')->name('home');
//ゲストアカウント認証用
Route::get('guest', 'Auth\LoginController@guestLogin')->name('guest.login');
