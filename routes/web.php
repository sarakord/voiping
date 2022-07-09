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

Route::prefix('admin')->namespace('App\Http\Controllers')->group(function () {

    Route::get('/', function () {
        return view('admin.layouts.index');
    })->name('admin.dashboard');


    Route::get('/users', 'UserController@index')->name('admin.user.index');
    Route::get('/contacts', 'ContactController@index')->name('admin.contact.index');
    Route::get('/calls', 'CallController@index')->name('admin.call.index');
    Route::get('/search/calls', 'CallController@search')->name('admin.call.search');
    Route::get('/search/result/{user_id}', 'CallController@result')->name('admin.call.search.result');
});
