<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', \App\Http\Controllers\BookController::class, ['except' => ['index', 'publicIndex', 'editorIndex', 'show']]);
Route::get('/books', [\App\Http\Controllers\BookController::class, 'publicIndex'])->name('books.publicIndex');
Route::get('/books-ed', [\App\Http\Controllers\BookController::class, 'editorIndex'])->name('books.editorIndex');
Route::get('/books/{id}/{origin}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::resource('readers', \App\Http\Controllers\ReaderController::class);
Route::post('/loans', [\App\Http\Controllers\LoanController::class, 'store']);
Route::post('/return', [\App\Http\Controllers\LoanController::class, 'returnCopy']);
Route::get('/loans', [\App\Http\Controllers\LoanController::class, 'index']);
Route::get('/loans/{id}', [\App\Http\Controllers\LoanController::class, 'show']);

