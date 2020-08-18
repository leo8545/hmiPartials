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

    // Specials
    Route::get('/specials', 'Admin\PostController@index')->name('admin.specials');
    Route::get('/specials/create', 'Admin\PostController@create')->name('admin.specials.create');
    Route::post('/specials', 'Admin\PostController@store')->name('specials.store');
    Route::get('/specials/edit/{post}', 'Admin\PostController@edit')->name('admin.specials.edit');
    Route::get('/specials/destroy/{post}', 'Admin\PostController@destroy')->name('admin.specials.destroy');
    Route::put('/specials/update/{post}', 'Admin\PostController@update')->name('admin.specials.update');
    // News
    Route::get('/news', 'Admin\PostController@index')->name('admin.news');
    Route::get('/news/create', 'Admin\PostController@create')->name('admin.news.create');
    Route::post('/news', 'Admin\PostController@store')->name('news.store');
    Route::get('/news/edit/{post}', 'Admin\PostController@edit')->name('admin.news.edit');
    Route::get('/news/destroy/{post}', 'Admin\PostController@destroy')->name('admin.news.destroy');
    Route::put('/news/update/{post}', 'Admin\PostController@update')->name('admin.news.update');
    // Events
    Route::get('/events', 'Admin\PostController@index')->name('admin.events');
    Route::get('/events/create', 'Admin\PostController@create')->name('admin.events.create');
    Route::post('/events', 'Admin\PostController@store')->name('events.store');
    Route::get('/events/edit/{post}', 'Admin\PostController@edit')->name('admin.events.edit');
    Route::get('/events/destroy/{post}', 'Admin\PostController@destroy')->name('admin.events.destroy');
    Route::put('/events/update/{post}', 'Admin\PostController@update')->name('admin.events.update');

    //Menu
    Route::get('/menu', 'Admin\MenuController@index')->name('admin.menu');
    Route::get('/menu/create', 'Admin\MenuController@create')->name('admin.menu.create');
    Route::post('/menu', 'Admin\MenuController@store')->name('menu.store');
    Route::get('/menu/destroy/{menu}', 'Admin\MenuController@destroy')->name('admin.menu.destroy');
    Route::get('/menu/edit/{menu}', 'Admin\MenuController@edit')->name('admin.menu.edit');
    Route::put('/menu/update/{menu}', 'Admin\MenuController@update')->name('admin.menu.update');
    
    //MenuSection
    Route::get('/menuSection', 'Admin\MenuSectionController@index')->name('admin.menuSection');
    Route::get('/menuSection/create', 'Admin\MenuSectionController@create')->name('admin.menuSection.create');
    Route::post('/menuSection', 'Admin\MenuSectionController@store')->name('menuSection.store');
    Route::get('/menuSection/destroy/{menuSection}', 'Admin\MenuSectionController@destroy')->name('admin.menuSection.destroy');
    Route::get('/menuSection/edit/{menuSection}', 'Admin\MenuSectionController@edit')->name('admin.menuSection.edit');
    Route::put('/menuSection/update/{menuSection}', 'Admin\MenuSectionController@update')->name('admin.menuSection.update');
    
    //MenuItem
    Route::get('/menuItem', 'Admin\MenuItemController@index')->name('admin.menuItem');
    Route::get('/menuItem/create', 'Admin\MenuItemController@create')->name('admin.menuItem.create');
    Route::post('/menuItem', 'Admin\MenuItemController@store')->name('menuItem.store');
    Route::get('/menuItem/destroy/{menuItem}', 'Admin\MenuItemController@destroy')->name('admin.menuItem.destroy');
    Route::get('/menuItem/edit/{menuItem}', 'Admin\MenuItemController@edit')->name('admin.menuItem.edit');
    Route::put('/menuItem/update/{menuItem}', 'Admin\MenuItemController@update')->name('admin.menuItem.update');
}) ;
