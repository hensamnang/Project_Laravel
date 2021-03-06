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

Route::get('/', function () {
    return view('auth.login');
});
Route::resource('student','StudentController');
Route::resource('comment','CommentController');
Auth::routes();
Route::post('/add/{id}','CommentController@addComment')->name('addComment');
Route::get('outOfFolloUp/{id}','StudentController@outOfFolloUp')->name('outOfFolloUp');
Route::get('backFolloUp/{id}','StudentController@backFolloUp')->name('backFolloUp');
Route::get('viewOutOfFollowUpList','StudentController@viewOutOfFollowUpList')->name('viewOutOfFollowUpList');
Route::get('/home', 'HomeController@index')->name('home');
