<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DivisionController; 
use App\Http\Controllers\Admin\Admin1Controller;
use App\Http\Controllers\Admin\Admin2Controller;
use App\Http\Controllers\Admin\Admin3Controller;
use App\Http\Controllers\Admin\Admin4Controller;
use App\Http\Controllers\Admin\Admin5Controller;
use App\Http\Controllers\User\UserLevel1Controller; 
use App\Http\Controllers\User\UserLevel2Controller;
use App\Http\Controllers\User\UserLevel3Controller;

// Ensure correct namespace for UserLevel1Controller

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

Route::middleware(['auth', 'role:admin2'])->group(function () {
    Route::get('/admin/adminlevel2', [Admin2Controller::class, 'index'])->name('admin.adminlevel2.index');
    Route::put('/admin/adminlevel2/{id}/approve', [Admin2Controller::class, 'approve'])->name('admin.adminlevel2.approve');
    Route::get('/admin/adminlevel2/{id}/edit', [Admin2Controller::class, 'edit'])->name('admin.adminlevel2.edit');
    Route::put('/admin/adminlevel2/{id}', [Admin2Controller::class, 'update'])->name('admin.adminlevel2.update');
});


Route::middleware(['auth', 'role:admin3'])->group(function () {
    Route::get('/admin/adminlevel3', [Admin3Controller::class, 'index'])->name('admin.adminlevel3.index');
    Route::put('/admin/adminlevel3/{id}/approve', [Admin3Controller::class, 'approve'])->name('admin.adminlevel3.approve');
    Route::put('/admin/adminlevel3/{id}', [Admin3Controller::class, 'update'])->name('admin.adminlevel3.update');
});

Route::middleware(['auth', 'role:admin4'])->group(function () {
    Route::get('/admin/adminlevel4', [Admin4Controller::class, 'index'])->name('admin.adminlevel4.index');
    Route::put('/admin/adminlevel4/{id}/approve', [Admin4Controller::class, 'approve'])->name('admin.adminlevel4.approve');
    Route::put('/admin/adminlevel4/{id}', [Admin4Controller::class, 'update'])->name('admin.adminlevel4.update');
});

Route::middleware(['auth', 'role:admin5'])->group(function () {
    Route::get('/admin/adminlevel5', [Admin5Controller::class, 'index'])->name('admin.adminlevel5.index');
    Route::put('/admin/adminlevel5/{id}/approve', [Admin5Controller::class, 'approve'])->name('admin.adminlevel5.approve');
    Route::put('/admin/adminlevel5/{id}/mark-complete', [Admin5Controller::class, 'markComplete'])->name('admin.adminlevel5.markComplete');
    Route::put('/admin/adminlevel5/{id}', [Admin5Controller::class, 'update'])->name('admin.adminlevel5.update');
});

// User Level 1 Routes
Route::prefix('user/userlevel1')->name('user.userlevel1.')->group(function() {
    Route::get('/', [UserLevel1Controller::class, 'index'])->name('index');
    Route::get('/edit/{id}', [UserLevel1Controller::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserLevel1Controller::class, 'update'])->name('update');
});

// User Level 2 Routes
Route::prefix('user/userlevel2')->name('user.userlevel2.')->group(function() {
    Route::get('/', [UserLevel2Controller::class, 'index'])->name('index');
    Route::get('/edit/{id}', [UserLevel2Controller::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserLevel2Controller::class, 'update'])->name('update');
    Route::put('/approve/{id}', [UserLevel2Controller::class, 'approve'])->name('approve');
});

// User Level 3 Routes
Route::prefix('user/userlevel3')->name('user.userlevel3.')->group(function() {
    Route::get('/', [UserLevel3Controller::class, 'index'])->name('index');
    Route::get('/edit/{id}', [UserLevel3Controller::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserLevel3Controller::class, 'update'])->name('update');
    Route::put('/approve/{id}', [UserLevel3Controller::class, 'approve'])->name('approve');
});

