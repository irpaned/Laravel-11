<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThreadController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
    Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
});

Route::middleware('guest')->group(function () {
    Route::get('/register/admin', [AuthController::class, 'showRegisterAdmin'])->name('register.show.admin');
    Route::get('/login/admin', [AuthController::class, 'showLoginAdmin'])->name('login.admin');
    Route::post('/register/submit/admin', [AuthController::class, 'submitRegisterAdmin'])->name('register.submit.admin');
    Route::post('/login/submit/admin', [AuthController::class, 'submitLoginAdmin'])->name('login.submit.admin');
    Route::post('/logout/admin', [AuthController::class, 'logoutAdmin'])->name('logout.admin');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/threads', [ThreadController::class, 'tampil'])->name('threads.tampil');
    Route::get('/tambah/threads', [ThreadController::class, 'tambah'])->name('threads.tambah');
    Route::post('/submit/threads', [ThreadController::class, 'submit'])->name('threads.submit');
    Route::get('/edit/threads/{id}', [ThreadController::class, 'edit'])->name('threads.edit');
    Route::post('/update/threads/{id}', [ThreadController::class, 'update'])->name('threads.update');
    Route::post('/delete/threads/{id}', [ThreadController::class, 'delete'])->name('threads.delete');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::post('/logout/admin', [AuthController::class, 'logoutAdmin'])->name('logout.admin');
});
