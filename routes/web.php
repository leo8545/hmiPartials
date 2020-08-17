<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/* Public Routes */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/specials', 'SpecialsController@index')->name('specials');
Route::get('/events', 'EventsController@index')->name('events');
Route::get('/menus', "MenusController@index")->name('menus');

/* Login Routes */
Auth::routes();
Route::get('/logout', 'Auth\LogoutController@logout') ;

/* Admin Routes */
Route::group(['prefix' => 'admin', 'middleware' => ['revalidate', 'auth']], function () {
    // admin and crud routes go here
    Route::any('/', 'Admin\DashboardController@index')->name('admin');
    Route::get('/specials', 'Admin\PostController@index')->name('admin.specials');
    Route::post('/specials', 'Admin\PostController@store');

    //Route::resource('post', 'PostController');
}) ;
