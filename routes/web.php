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

Route::view('/', 'welcome')->name('welcome');

Auth::routes();

Route::middleware(['auth', 'administrator'])->prefix('admin')->group(function () {
    Route::get('/panel', 'AdminController@panel')->name('admin.panel');

    Route::resource('users', 'UserController', ['except' => ['create', 'store', 'show']]);
    Route::get('/ban/{user}', 'UserController@ban')->name('users.ban');
});

Route::middleware(['auth', 'moderator'])->prefix('mod')->group(function () {
    Route::get('/panel', 'ModeratorController@panel')->name('mod.panel');

    Route::group(['prefix' => 'reviews'], function () {
        Route::get('/', 'ReviewController@index')->name('reviews.index');
        Route::get('/to_verification', 'ReviewController@toVerification')->name('reviews.to_verification');
        Route::patch('/verify/{review}', 'ReviewController@verify')->name('reviews.verify');
        Route::delete('/{review}', 'ReviewController@destroy')->name('reviews.destroy');
    });

    Route::resource('types', 'TypeController');
    Route::resource('actors', 'ActorController');

    Route::get('/films', 'FilmController@index')->name('films.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/edit_profile', 'HomeController@editProfile')->name('edit_profile');
    Route::patch('/update_profile', 'HomeController@updateProfile')->name('update_profile');

    Route::group(['prefix' => 'films'], function () {
        Route::get('/{film}/add_to_list', 'FilmController@addToList')->name('films.add_to_list');
        Route::get('/{film}/remove_from_list', 'FilmController@removeFromList')->name('films.remove_from_list');

        Route::get('/my_list', 'FilmController@myList')->name('films.my_list');
    });

    Route::resource('films', 'FilmController', ['except' => ['index', 'show']]);
    Route::resource('reviews', 'ReviewController', ['only' => ['store']]);
});

Route::group(['prefix' => 'films'], function () {
    Route::get('/list', 'FilmController@list')->name('films.list');
    Route::get('/{film}', 'FilmController@show')->name('films.show');
});