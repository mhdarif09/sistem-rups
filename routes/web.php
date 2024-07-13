<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisionController; 
use App\Http\Controllers\Admin1Controller;
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

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk registrasi pengguna
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rute untuk login
Auth::routes();

// Rute untuk home dengan middleware 'approved'
Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Rute untuk admin dengan middleware 'auth' dan 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('users/{user}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
});

Route::prefix('admin')->group(function () {
    Route::get('/admin1', [Admin1Controller::class, 'index'])->name('admin.adminlevel1.index');
    Route::get('/admin1/create', [Admin1Controller::class, 'create'])->name('admin.adminlevel1.create');
    Route::post('/admin1/store', [Admin1Controller::class, 'store'])->name('admin.adminlevel1.store');
    Route::get('/admin1/{id}/edit', [Admin1Controller::class, 'edit'])->name('admin.adminlevel1.edit');
    Route::delete('/admin1/{id}', [Admin1Controller::class, 'destroy'])->name('admin.adminlevel1.destroy');
    Route::put('/admin1/{id}', [Admin1Controller::class, 'update'])->name('admin.adminlevel1.update');
});

