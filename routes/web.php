<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', \App\Http\Controllers\BookController::class);
Route::resource('readers', \App\Http\Controllers\ReaderController::class);
Route::post('/loans', [\App\Http\Controllers\LoanController::class, 'store']);
Route::post('/return', [\App\Http\Controllers\LoanController::class, 'returnCopy']);
Route::get('/loans', [\App\Http\Controllers\LoanController::class, 'index']);
Route::get('/loans/{id}', [\App\Http\Controllers\LoanController::class, 'show']);

