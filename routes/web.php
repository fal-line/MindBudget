<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/board/{id}', [App\Http\Controllers\ExpenseBoardsController::class,'index'])->name('board-index');
    Route::patch('/board/{id}', [App\Http\Controllers\ExpenseItemsController::class,'update']);
    Route::post('/board/{id}', [App\Http\Controllers\ExpenseItemsController::class,'store']);
});


Route::controller(OrderController::class)->group(function () {
    Route::post('/board', [App\Http\Controllers\ExpenseBoardsController::class,'store']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
