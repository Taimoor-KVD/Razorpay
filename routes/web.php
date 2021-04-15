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

// *.*.* Default Routes *.*.* //
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// *.*.* End Default Routes *.*.* //

// *.*.* Payment Gateway Routes *.*.* //
Route::get('/', 'MainController@index')->name('home');
Route::post('/payment', 'MainController@payment');
Route::post('/pay', 'MainController@pay');
Route::get('/success', 'MainController@success');
// *.*.* End Payment Gateway Routes *.*.* //