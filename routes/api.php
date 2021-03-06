<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('books','Api\BooksController@index');
Route::get('book/{book}','Api\BooksController@show');
Route::post('book','Api\BooksController@store');
Route::post('book/{id}/update','Api\BooksController@update');
Route::delete('book/{book}/destroy','Api\BooksController@destroy');
