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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {


	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);



//Routes for crud
	Route::resource('category', 'App\Http\Controllers\CategoryController', ['except' => ['show']])->middleware('verified');
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']])->middleware('verified');
	Route::resource('tag', 'App\Http\Controllers\TagController', ['except' => ['show']])->middleware('verified');
	Route::resource('article', 'App\Http\Controllers\ArticleController', ['except' => ['show']])->middleware('verified');

//route for create article
 Route::get('article/add', function () {return view('pages.add_article');})->name('add.article')->middleware('verified');
});

