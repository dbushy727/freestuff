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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/listings', 'ListingController@index');
Route::post('/listings', 'ListingController@store');
Route::get('/listings/{id}', 'ListingController@show');
Route::put('/listings/{id}', 'ListingController@update');
Route::delete('/listings/{id}', 'ListingController@destroy');

Route::get('/listing-images', 'ListingImageController@index');
Route::post('/listing-images', 'ListingImageController@store');
Route::get('/listing-images/{id}', 'ListingImageController@show');
Route::put('/listing-images/{id}', 'ListingImageController@update');
Route::delete('/listing-images/{id}', 'ListingImageController@destroy');