<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Auth::routes(['register' => false]);

Route::get('/home', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/company-logos/{filename}', function ($filename) {
        
        abort_unless(
            preg_match('/\A[a-zA-Z0-9._-]+\z/', $filename),
            404
        );

        $path = 'companies/' . $filename;

        abort_unless(Storage::disk('public')->exists($path), 404);

        return response()->file(
            Storage::disk('public')->path($path)
        );

    })->name('company-logos.show');

    Route::resource('companies', CompanyController::class)
        ->except(['show']);

    Route::resource('employees', EmployeeController::class)
        ->except(['show']);
});