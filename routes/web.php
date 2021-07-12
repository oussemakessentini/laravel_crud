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

 /*Route::get('/acceuil', function () {
     return view('pages.home');
 });*/

 /*Route::get('/apropos', function () {
    return view('pages.apropos');
});*/

/*Route::get('/services', function () {
    return view('pages.services');
});*/

//route::get('/accueil','welcomeController@index')->name('acceuil');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/info/{nom}/{id}',function($nom , $id){
    return '<h1> Mon nom est ' .$nom. ' Et mon id est ' .$id. '</h1>'; 
});

Route::get('/acceuil', 'PagesController@home')->name('acceuil');

Route::get('/apropos', 'PagesController@apropos');

Route::get('/services', 'PagesController@services');

Route::view('clientview','client');
Route::post('ClientController','ClientController@account');

Route::get('products','ProductController@index')->name('product.index');
Route::get('create','ProductController@create')->name('product.create');
Route::post('store','ProductController@store')->name('product.store');
Route::get('edit/product/{id}','ProductController@edit');
Route::post('update/product/{id}','ProductController@update');
Route::get('delete/product/{id}','ProductController@delete');
Route::get('show/product/{id}','ProductController@show');