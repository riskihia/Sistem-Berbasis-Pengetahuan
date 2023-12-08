<?php

use App\Http\Controllers\CfController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\MemberMiddleware;
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



Route::group(['middleware' => ['web', MemberMiddleware::class]], function () {
    Route::get('/member', [CfController::class, "member"])->name("halamanMember");
    Route::get('/periksa', [CfController::class, 'question']);
    Route::get("/periksa-proses", [CfController::class, "hitung"]);
    Route::post('/logout', [UserController::class, "logout"]);
});


Route::group(['middleware' => ['web', GuestMiddleware::class]], function () {
    Route::get('/', [CfController::class, "index"]);
    Route::get('/login', [UserController::class, "loginPage"]);
    Route::post('/login', [UserController::class, "doLogin"]);
    Route::get('/register', [UserController::class, "registerPage"]);
    Route::post('/register', [UserController::class, "doRegister"]);
});

