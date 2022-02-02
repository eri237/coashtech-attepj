<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


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

require __DIR__.'/auth.php';

Route::get('/', [JobController::class, 'new'])->middleware('auth');
Route::post('/', [JobController::class, 'create'])->middleware('auth');
//出退勤打刻
Route::post('/workstart', [JobController::class, 'workstart']);
Route::post('/workend', [JobController::class, 'workend']);
//休憩打刻
Route::post('/breakstart', [JobController::class, 'breakstart']);
Route::post('/breakend', [JobController::class, 'breakend']);

//勤怠実績
//Route::get('/time/performance', 'TimeController@performance');
//Route::post('/time/performance', 'TimeController@result');
//日次勤怠
//Route::get('/time/daily', 'TimeController@daily');
//Route::post('/time/daily', 'TimeController@dailyResult');
Route::post('/attendance', [JobController::class, 'index'])->middleware('auth');


