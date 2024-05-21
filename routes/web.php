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


