<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/works', [PostController::class, 'index']);
Route::get('/works/{id}', [PostController::class, 'show']);

Route::get('/content', [ContentController::class, 'index']);
Route::get('/content/{id}', [ContentController::class, 'show']);

Route::post('/subscribe', [NewsletterController::class, 'subscribe']);
Route::post('/unsubscribe', [NewsletterController::class, 'unsubscribe']);
