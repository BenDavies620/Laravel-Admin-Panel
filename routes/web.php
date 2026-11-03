<?php

use App\Http\Controllers\CompanyController;

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('companies', CompanyController::class)->middleware('auth');