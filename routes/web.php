<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\license\CreateLicenseController;
use App\Http\Controllers\license\ActiveLicenseController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/create_license', [CreateLicenseController::class, 'index'])->name('create_license');
Route::post('/create_license', [CreateLicenseController::class, 'store']);

Route::get('/user/{id}', [CreateLicenseController::class, 'getUserData'])->where('id', '[0-9]+');

Route::get('/active_license', [ActiveLicenseController::class, 'index'])->name('active_license');
Route::post('/active_license', [ActiveLicenseController::class, 'store']);

