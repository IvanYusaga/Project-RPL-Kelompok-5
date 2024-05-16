<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScrambleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListeningController;
use App\Http\Controllers\AfterLoginController;
use App\Http\Controllers\BlankWordsController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('play');
});

Route::get('/choose', function () {
    return view('afterplay');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/scramble', [ScrambleController::class, 'index']);

Route::get('/listening', [ListeningController::class, 'index']);

Route::get('/afterlogin', [AfterLoginController::class, 'index']);

Route::get('/blank-words', [BlankWordsController::class, 'index']);
