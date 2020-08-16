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

Route::get('/menus', "\App\Http\Controllers\MenusController@index")->name('menus');


/*
 * Admin Routes
 */

Auth::routes();
Route::get('/logout', 'Auth\LogoutController@logout') ;

Route::group(['middleware' => ['revalidate', 'auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/cases', 'HomeController@index')->name('cases');
    Route::get('/toolkit', 'ToolkitController@index')->name('toolkit');

    Route::get('/admin/users', 'ToolkitController@index')->name('admin.users');
}) ;
