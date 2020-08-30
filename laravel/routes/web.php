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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/generate-shorten-link', 'URLController@index');

Route::get('/apis/generate-shorten-link', 'URLController@apiindex');

Route::post('/generate-shorten-link', 'URLController@store')->name('generate.shorten.link.post');
   
Route::get('/go/{code}', 'URLController@shortenLink')->name('shorten.link');

Route::get('/register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');
 
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
