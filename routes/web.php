<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('index');
});

Route::get('/works', [PostController::class, 'index']);
Route::get('/works/create', [PostController::class, 'create']);
Route::get('/works/{id}/edit', [PostController::class, 'edit']);
Route::put('/works/{id}', [PostController::class, 'update']);
Route::delete('/works/{id}', [PostController::class, 'destroy']);
Route::post('/works/save', [PostController::class, 'save']);
