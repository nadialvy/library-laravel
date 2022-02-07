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

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
    
});

Route::middleware(['jwt.verify'])->group(function () { 
    Route::get('/Book', 'BookController@show');
    Route::get('/Book/{id}', 'BookController@detail');
   
    Route::post('/Book', 'BookController@store');
    
    Route::delete('/Book/{id}', 'BookController@delete');

    Route::put('/Book/{id}', 'BookController@update');
});

//POST
Route::post('/Students', 'StudentsController@store');
Route::post('/Grade', 'GradeController@store');
Route::post('/BookBorrow', 'BookBorrowController@store');
Route::post('/BookReturn', 'BookReturnController@store');
Route::post('/BookBorrowDetails', 'BookBorrowDetailsController@store');

//GET
Route::get('/Students', 'StudentsController@show');
Route::get('/Students/{id}', 'StudentsController@detail');

Route::get('/Grade', 'GradeController@show');
Route::get('/Grade/{id}', 'GradeController@detail');

Route::get('/BookBorrow', 'BookBorrowController@show');
Route::get('/BookBorrow/{id}', 'BookBorrowController@detail');

Route::get('/BookReturn', 'BookReturnController@show');
Route::get('/BookReturn/{id}', 'BookReturnController@detail');

Route::get('/BookBorrowDetails', 'BookBorrowDetailsController@show');
Route::get('/BookBorrowDetails/{id}', 'BookBorrowDetailsController@detail');

//DELETE
Route::delete('/Students/{id}', 'StudentsController@delete');
Route::delete('/Grade/{id}', 'GradeController@delete');
Route::delete('/BookBorrow/{id}', 'BookBorrowController@delete');
Route::delete('/BookReturn/{id}', 'BookReturnController@delete');
Route::delete('/BookBorrowDetails/{id}', 'BookBorrowDetailsController@delete');

//UPDATE
Route::put('/Students/{id}', 'StudentsController@update');
Route::put('/Grade/{id}', 'GradeController@update');
Route::put('/BookBorrow/{id}', 'BookBorrowController@update');
Route::put('/BookReturn/{id}', 'BookReturnController@update');
Route::put('/BookBorrowDetails/{id}', 'BookBorrowDetailsController@update');

//LOGIN REGISTER
Route::post('/Register', 'UserController@register');
Route::post('/Login', 'UserController@login');









