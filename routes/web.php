<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColocationController;
Route::get('/', [HomeController::class , 'index']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';



// Route::get('/Dashboard', [AdminController::class , 'index'])->name('dashboard.show');
Route::get('/signup', [RegisteredUserController::class , 'create'])->name('signup');
Route::get( '/login', [AuthenticatedSessionController::class , 'create'])->name('login');


Route::delete('/banuser/{userId}', [AdminController::class , 'banUser'])->name('banUser');
Route::delete('/Unbanuser/{userId}', [AdminController::class , 'UnbanUser'])->name('UnbanUser');
Route::post('/collocation', [ColocationController::class , 'store'])->name('collocation.store');


Route::get('/collocation' , [ColocationController::class , 'index'])->name('collocation.show');