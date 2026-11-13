<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Auth::routes(['register' => false]);

Route::get('/home', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::middleware('auth')->group(function () {

    Route::resource('companies', CompanyController::class)
        ->except(['show']);

    Route::resource('employees', EmployeeController::class)
        ->except(['show']);

});