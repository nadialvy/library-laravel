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

//POST
Route::post('/Students', 'StudentsController@store');
Route::post('/Grade', 'GradeController@store');
Route::post('/Book', 'BookController@store');
Route::post('/BookBorrow', 'BookBorrowController@store');
Route::post('/BookReturn', 'BookReturnController@store');
Route::post('/BookBorrowDetails', 'BookBorrowDetailsController@store');

//GET
Route::get('/Students', 'StudentsController@show');
Route::get('/Students/{id}', 'StudentsController@detail');

Route::get('/Grade', 'GradeController@show');
Route::get('/Grade/{id}', 'GradeController@detail');

Route::get('/Book', 'BookController@show');
Route::get('/Book/{id}', 'BookController@detail');

Route::get('/BookBorrow', 'BookBorrowController@show');
Route::get('/BookBorrow/{id}', 'BookBorrowController@detail');

Route::get('/BookReturn', 'BookReturnController@show');
Route::get('/BookReturn/{id}', 'BookReturnController@detail');

Route::get('/BookBorrowDetails', 'BookBorrowDetailsController@show');
Route::get('/BookBorrowDetails/{id}', 'BookBorrowDetailsController@detail');





