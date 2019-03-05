<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('V1')->group(function () {
    Route::prefix('books')->group(function () {
        Route::get('/', 'BooksController@index');
        Route::post('/add', 'BooksController@add');
        Route::post('/rental', 'BooksController@rental');
        Route::post('/return', 'BooksController@return');
        Route::get('/{id}', 'BooksController@detail');
    });
});