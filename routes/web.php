<?php

use App\Http\Controllers\PostController;
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
    return response()->json(['message' => 'Halo!']);
})->name('user.home');

Auth::routes();


// Route::get('/works', [PostController::class, 'index']);
// Route::get('/works/create', [PostController::class, 'create']);
// Route::get('/works/{id}/edit', [PostController::class, 'edit']);
// Route::put('/works/{id}', [PostController::class, 'update']);
// Route::delete('/works/{id}', [PostController::class, 'destroy']);
// Route::post('/works/save', [PostController::class, 'save']);


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => [
        'role:admin',
        'auth'
    ]
], function () {

    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::resource('works', App\Http\Controllers\Admin\PostController::class);

    Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{slug}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/table', [App\Http\Controllers\Admin\UserController::class, 'table'])->name('user.table');
    Route::get('user/export', [App\Http\Controllers\Admin\UserController::class, 'export'])->name('user.export');
    Route::get('/user/{id}/log-activity', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/orders', [App\Http\Controllers\Admin\UserController::class, 'orders'])->name('user.orders');
    Route::get('/user/{id}/personal-information', [App\Http\Controllers\Admin\UserController::class, 'personal'])->name('user.personal');
    Route::get('/user/{id}/account-information', [App\Http\Controllers\Admin\UserController::class, 'account'])->name('user.account');
    Route::post('/user/{id}/personal-information/update', [App\Http\Controllers\Admin\UserController::class, 'personalUpdate'])->name('user.personal.update');
    Route::get('/user/{id}/password', [App\Http\Controllers\Admin\UserController::class, 'password'])->name('user.password');
    Route::post('/user/{id}/password', [App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('user.password.update');
    Route::get('/user/{id}/certificate', [App\Http\Controllers\Admin\UserController::class, 'certificate'])->name('user.certificate');
    Route::get('/user/{id}/subscription', [App\Http\Controllers\Admin\UserController::class, 'subscription'])->name('user.subscription');
    Route::get('/user/{id}/event', [App\Http\Controllers\Admin\UserController::class, 'event'])->name('user.event');

    Route::get('/role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
    Route::post('/role/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role.index');

    Route::get('/content/table', [App\Http\Controllers\Admin\ContentController::class, 'table'])->name('content.table');
    Route::get('/content/selected/{id}', [App\Http\Controllers\Admin\ContentController::class, 'selectedUpdate'])->name('content.selected.update');
    Route::resource('content', App\Http\Controllers\Admin\ContentController::class);
});
