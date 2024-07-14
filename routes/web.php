<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisionController; 
use App\Http\Controllers\Admin\Admin1Controller;
use App\Http\Controllers\User\UserLevel1Controller; // Ensure correct namespace for UserLevel1Controller

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

Route::middleware(['auth', 'role:admin1'])->group(function () {
    Route::get('/admin/adminlevel1', [Admin1Controller::class, 'index'])->name('admin.adminlevel1.index');
    Route::get('/admin/adminlevel1/create', [Admin1Controller::class, 'create'])->name('admin.adminlevel1.create');
    Route::post('/admin/adminlevel1', [Admin1Controller::class, 'store'])->name('admin.adminlevel1.store');
    Route::get('/admin/adminlevel1/{id}/edit', [Admin1Controller::class, 'edit'])->name('admin.adminlevel1.edit');
    Route::put('/admin/adminlevel1/{id}', [Admin1Controller::class, 'update'])->name('admin.adminlevel1.update');
    Route::delete('/admin/adminlevel1/{id}', [Admin1Controller::class, 'destroy'])->name('admin.adminlevel1.destroy');
});

Route::middleware(['auth', 'role:user1'])->group(function () {
    Route::get('/user/userlevel1', [UserLevel1Controller::class, 'index'])->name('user.userlevel1.index');
    Route::get('/user/userlevel1/{id}/edit', [UserLevel1Controller::class, 'edit'])->name('user.userlevel1.edit');
    Route::put('/user/userlevel1/{id}', [UserLevel1Controller::class, 'update'])->name('user.userlevel1.update');
});