<?php

use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;



Route::get('/', [\App\Http\Controllers\StudentController::class, 'index'])->name('pages-home');


Route::get('/page-2', [\App\Http\Controllers\StudentOrderController::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/p', [\App\Http\Controllers\StudentController::class, 'index']);

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

//students
Route::resource('/students',\App\Http\Controllers\StudentController::class);


//orders
Route::resource('/orders', \App\Http\Controllers\StudentOrderController::class);



Route::resource('/or', \App\Http\Controllers\OrderTypeController::class);




//Fallback
Route::fallback([FallbackController::class, 'handle']);


