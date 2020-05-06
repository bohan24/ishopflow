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

Route::get('/','ProductController@frontend');
Route::any('/test','TestController@test');
Route::group(['prefix'=>'backend'],function()
{
    Route::any('/','ProductController@index');
    Route::any('/create','ProductController@create');    
    Route::post('/add','ProductController@add');
    Route::any('/edit/{id}','ProductController@edit');
    Route::post('/update/{id}','ProductController@update');
    Route::post('/delete','ProductController@delete');
});
