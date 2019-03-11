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
        // 書籍一覧取得
        Route::get('/', 'BooksController@index');

        // 書籍追加
        Route::post('/add', 'BooksController@add');

        // 書籍貸出
        Route::post('/rental', 'BooksController@rental');

        // 書籍返却
        Route::post('/return', 'BooksController@return');

        // 書籍検索
        Route::get('/search', 'BooksController@search');

        // 書籍詳細取得
        Route::get('/{id}', 'BooksController@detail');
    });
});