<?php

use App\Http\Controllers\PackageController;
use App\Http\Controllers\TrackAndTraceController;
use App\Models\TrackAndTrace;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/track-and-trace/{id}' , TrackAndTraceController::class . '@show')->name('track-and-trace');
Route::get('/track-and-trace/{id}/identify', TrackAndTraceController::class . '@identify')->name('tat_identify');
Route::get('/track-and-trace/{id}/add_user', TrackAndTraceController::class . '@addUser')->name('tat_add_user')->middleware('auth');
