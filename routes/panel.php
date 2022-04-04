<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PickUpController;
use Illuminate\Support\Facades\Route;
use Laravel\Dusk\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/create_superadmin', RegisteredUserController::class . '@createSuperAdmin')->middleware('auth');
Route::post('/create_superadmin', RegisteredUserController::class . '@storeSuperAdmin')->name('create_superadmin')->middleware('auth');
Route::get('/import_package', PackageController::class . '@importIndex')->name('import_package')->middleware('auth');
Route::post('/import_package', PackageController::class . '@import')->name('import_package')->middleware('auth');
Route::get('/packages', PackageController::class . '@indexPage')->name('packages')->middleware('auth');
Route::get('/packages/{id}', PackageController::class . '@showPackage')->name('showpackage')->middleware('auth');
Route::get('/labels/create', LabelController::class . '@createLabels')->name('createlabels')->middleware('auth');
Route::get('/labels/downloadpdf', LabelController::class . '@downloadLabel')->name('downloadpdf')->middleware('auth');
Route::get('/labels/downloadbulkpdf', LabelController::class . '@downloadBulkLabels')->name('downloadbulkpdf')->middleware('auth');
Route::get('/labels', LabelController::class . '@index')->name('labels')->middleware('auth');

Route::get('/pickup', PickUpController::class . '@index')->name('pickup')->middleware('auth');
Route::get('/pickup/plan', PickUpController::class . '@create')->name('plan_pickup')->middleware('auth');
Route::post('/pickup/plan', PickUpController::class . '@store')->name('store_pickup')->middleware('auth');
Route::get('/pickup/planned', PickUpController::class . '@planned')->name('planned_pickups')->middleware('auth');
Route::get('/pickup/{id}', PickUpController::class . '@show')->name('show_pickup')->middleware('auth');
Route::post('/pickup/{id}/pickup', PickUpController::class . '@pickUp')->name('set_picked_up')->middleware('auth');

Route::get('/customers', CustomerController::class . '@index')->name('customers')->middleware('auth');
