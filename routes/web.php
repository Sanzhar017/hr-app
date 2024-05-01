<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\MiscError;


Route::middleware('guest')->group(function () {
  Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register', [AuthController::class, 'register']);

  Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [AuthController::class, 'login']);
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function () {
  Route::resource('/employees',\App\Http\Controllers\EmployeeController::class);
  Route::resource('/orders', \App\Http\Controllers\EmployeeOrderController::class);
  Route::resource('/handbooko', \App\Http\Controllers\OrderTypeController::class)->parameters(['handbooko' => 'orderType']);

  Route::resource('/handbookd', \App\Http\Controllers\DepartmentController::class)->parameters(['handbookd' => 'department']);
  Route::resource('/statuses', \App\Http\Controllers\StatusController::class);
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


});


Route::get('/', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('pages-home');


Route::get('/page-2', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/p', [\App\Http\Controllers\EmployeeController::class, 'index']);


//employees

//Route::resource('/employees',\App\Http\Controllers\EmployeeController::class);


//orders
//Route::resource('/orders', \App\Http\Controllers\EmployeeOrderController::class);


Route::resource('/or', \App\Http\Controllers\OrderTypeController::class);

//Route::resource('/handbooko', \App\Http\Controllers\OrderTypeController::class)->parameters(['handbooko' => 'orderType']);
//
//Route::resource('/handbookd', \App\Http\Controllers\DepartmentController::class)->parameters(['handbookd' => 'department']);
//Route::resource('/statuses', \App\Http\Controllers\StatusController::class);


//Fallback
Route::fallback([FallbackController::class, 'handle']);


