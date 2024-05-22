<?php

use App\Http\Controllers\AuthController;
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
    return view('landingpages/master');
});

Route::get('/employee', function () {
    return view('employee/index');
});

Route::get('/admin', function () {
    return view('admin/index');
});

Route::get('/login', [AuthController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('listCategory');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('createCategory');
Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('storeCategory');
Route::get('/category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('editCategory');
Route::post('/category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
Route::get('/category/{id}/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');


