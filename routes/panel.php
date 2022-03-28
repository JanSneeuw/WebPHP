<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/create_superadmin', RegisteredUserController::class . '@createSuperAdmin')->middleware('auth');
Route::post('/create_superadmin', RegisteredUserController::class . '@storeSuperAdmin')->name('create_superadmin')->middleware('auth');
Route::get('/import_package', PackageController::class . '@importIndex')->name('import_package')->middleware('auth');
Route::post('/import_package', PackageController::class . '@import')->name('import_package')->middleware('auth');
Route::get('/packages', PackageController::class . '@indexPage')->name('packages')->middleware('auth');
