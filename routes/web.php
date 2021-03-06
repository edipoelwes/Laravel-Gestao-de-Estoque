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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});//->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function () {

    Route::resource('store', 'Admin\\ProductController');
    Route::get('delete{store}', 'Admin\\ProductController@showDelete')->name('store.delete');


    Route::get('diaper', 'Admin\\DiaperController@create')->name('diaper.create');
    Route::post('diaper/store', 'Admin\\DiaperController@store')->name('diaper.store');

});



/*Route::prefix('loja')->namespace('Admin')->group(function() {

    Route::resource('admin', 'AdminController');
});*/
