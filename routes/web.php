<?php

use App\Http\Controllers\CfController;
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

Route::get("/periksa-proses", [CfController::class, "hitung"]);

Route::get('/', [CfController::class, "index"]);
Route::get('/member', [CfController::class, "member"]);
Route::get("/periksa", [CfController::class, "question"]);


Route::get('/login', function(){
    return view('auth.login');
});

Route::get('/register', function(){
    return view('auth.register');
});
