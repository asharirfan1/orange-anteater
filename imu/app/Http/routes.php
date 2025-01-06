<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// pages
Route::get('/', 'PagesController@index');
Route::get('/pages/questions', 'PagesController@questions');
Route::post('pages/questions', 'PagesController@saveQuestion');
Route::get('pages/questions/search', 'PagesController@searchQuestion');
Route::get('/pages/order', 'PagesController@order');
Route::post('/pages/order', 'PagesController@saveOrder');
Route::get('/pages/{page}', 'PagesController@show');

// articles
Route::get('/articles/{product}', 'ArticlesController@index');
Route::get('/articles/{product}/search', 'ArticlesController@search');
Route::get('/articles/{product}/{article}', 'ArticlesController@show');

// photos
Route::get('/photos/{product}', 'PhotosController@index');
Route::get('/photos/{product}/search', 'PhotosController@search');
Route::get('/photos/{product}/{photo}', 'PhotosController@show');

// chimneys
Route::get('/chimneys', 'ChimneysController@index');
Route::get('/chimneys/search', 'ChimneysController@search');
Route::get('/chimneys/prices', 'ChimneysController@prices');
Route::get('/chimneys/catalog', 'ChimneysController@catalog');
Route::get('/chimneys/catalog/{type}', 'ChimneysController@showByType');
Route::get('/chimneys/catalog/{type}/{chimney}', 'ChimneysController@show');

// briquettes
Route::get('/briquettes', 'BriquettesController@index');
Route::get('/briquettes/catalog', 'BriquettesController@catalog');
Route::get('/briquettes/search', 'BriquettesController@search');
Route::get('/briquettes/prices', 'BriquettesController@prices');
//Route::get('/briquettes/{type}', 'BriquettesController@showByType');
Route::get('/briquettes/{briquette}', 'BriquettesController@show');

// boilers
Route::get('/boilers', 'BoilersController@index');
Route::get('/boilers/catalog', 'BoilersController@catalog');
Route::get('/boilers/search', 'BoilersController@search');
Route::get('/boilers/prices', 'BoilersController@prices');
//Route::get('/boilers/{type}', 'BoilersController@showByType');
Route::get('/boilers/{boiler}', 'BoilersController@show');

// prices
Route::get('/prices/{name}/{width}', 'PricesController@getPrice');

// admin
Route::get('/admin/login', 'Auth\AuthController@getLogin');
Route::post('/admin/login', 'Auth\AuthController@postLogin');
Route::get('/admin/logout', 'Auth\AuthController@logout');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'ChimneysController@index');
    Route::get('/chimneys/search', 'ChimneysController@search');
    Route::resource('chimneys', 'ChimneysController', [
        'parameters' => 'singular',
    ]);

    Route::get('/briquettes/search', 'BriquettesController@search');
    Route::resource('briquettes', 'BriquettesController', [
        'parameters' => 'singular',
    ]);

    Route::get('/boilers/search', 'BoilersController@search');
    Route::resource('boilers', 'BoilersController', [
        'parameters' => 'singular',
    ]);

    Route::get('/articles/search', 'ArticlesController@search');
    Route::resource('articles', 'ArticlesController', [
        'parameters' => 'singular',
    ]);

    Route::get('/photos/search', 'PhotosController@search');
    Route::resource('photos', 'PhotosController', [
        'parameters' => 'singular',
    ]);

    Route::get('/orders/search', 'OrdersController@search');
    Route::resource('orders', 'OrdersController', [
        'parameters' => 'singular',
    ]);

    Route::get('/pages/search', 'PagesController@search');
    Route::resource('pages', 'PagesController', [
        'parameters' => 'singular',
    ]);

    Route::get('/questions/search', 'QuestionsController@search');
    Route::get('/questions', 'QuestionsController@index');
    Route::get('/questions/{question}/approve', 'QuestionsController@approve');
    Route::get('/questions/{question}/answer', 'QuestionsController@answer');
    Route::post('/questions/{question}/answer', 'QuestionsController@saveAnswer');
    Route::delete('/questions/{id}', 'QuestionsController@destroy');
});
