<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\matchesController;
use App\Http\Controllers\standingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// match Controller
Route::get('/', [matchesController::class, 'matches']);
Route::get('matchDetails/{id}', [matchesController::class, 'matchDetails'])->name('matchDetails');

// standings controller
Route::get('/standings', [standingsController::class, 'standings'])->name('standings');
