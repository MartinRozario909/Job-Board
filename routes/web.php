<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MyJobController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('job.index'));

Route::resource('job', JobController::class)
    ->only(['index', 'show']);

// Route::get('login', fn() => to_route('auth.create'))->name('login');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'userLogin'])->name('auth.store');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

// Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-applications', MyJobApplicationController::class)
        ->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)
        ->only(['create', 'store']);

    Route::middleware('employer')
        ->resource('my-jobs', MyJobController::class);
});
