<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JobController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\LogoutController;
use Illuminate\Http\Response;


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
//Route::post('/', [JobController::class, 'create'])->middleware('auth');
//出退勤打刻
Route::post('/workstart', [JobController::class, 'start'])->middleware('auth');
Route::post('/workend', [JobController::class, 'end'])->middleware('auth');
//休憩打刻
Route::post('/breakstart', [RestController::class, 'start'])->middleware('auth');
Route::post('/breakend', [RestController::class, 'end'])->middleware('auth');

Route::get('/attendance', [JobController::class, 'index'])->middleware('auth');
Route::post('/attendance', [JobController::class, 'index'])->name('index');
