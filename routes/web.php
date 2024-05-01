<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;



Route::get('/', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('pages-home');


Route::get('/page-2', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/p', [\App\Http\Controllers\EmployeeController::class, 'index']);

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

//employees
Route::resource('/employees',\App\Http\Controllers\EmployeeController::class);


//orders
Route::resource('/orders', \App\Http\Controllers\EmployeeOrderController::class);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::resource('/or', \App\Http\Controllers\OrderTypeController::class);

Route::resource('/handbooko', \App\Http\Controllers\OrderTypeController::class)->parameters(['handbooko' => 'orderType']);

Route::resource('/handbookd', \App\Http\Controllers\DepartmentController::class)->parameters(['handbookd' => 'department']);
Route::resource('/statuses', \App\Http\Controllers\StatusController::class);


//Fallback
Route::fallback([FallbackController::class, 'handle']);


