<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\BreakController;
use App\Http\Controllers\LogoutController;


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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/', [JobController::class, 'new'])->middleware('auth');
Route::post('/', [JobController::class, 'create'])->middleware('auth');
//出退勤打刻
Route::post('/workstart', [JobController::class, 'start']);
Route::post('/workend', [JobController::class, 'end']);
//休憩打刻
Route::post('/breakstart', [BreakController::class, 'start']);
Route::post('/breakend', [BreakController::class, 'end']);

Route::get('/attendance', [JobController::class, 'index'])->middleware('auth');
