<?php

use App\Http\Controllers\CardBusinessController;
use App\Http\Controllers\CardProController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('/users', UserController::class)->names('users');

    Route::get('/plans', [PlansController::class, 'index'])->name('plans');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboardPRO', [DashboardProController::class, 'index'])->name('dashboardPRO');
    Route::get('/card', [CardProController::class, 'index'])->name('card');
    Route::get('/cardBusiness', [CardBusinessController::class, 'index'])->name('cardBusiness');

    /* Route::resource('roles', RoleController::class)->names('admin.roles'); */
});
