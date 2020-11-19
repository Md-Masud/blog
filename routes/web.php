<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', [FrontendController::class, 'index']);
Route::get('/index', [FrontendController::class, 'index'])->name('index');
Route::namespace('Frontend')->group(function(){
});

// registation Route
Route::get('/register',[AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[AuthController::class, 'processRegister']);
//login route
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'processLogin']);

