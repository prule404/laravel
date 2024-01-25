<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::middleware('auth')->group(function () {
    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('', [ProfileController::class, 'update'])->name('update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::middleware('verified')->group(function () {
        Route::get('/dashboard', [PostController::class , 'index'])->name('dashboard');

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [PostController::class , 'index'])->name('index');

            Route::get('/create', [PostController::class , 'create'])->name('create');
            Route::post('/', [PostController::class , 'store'])->name('store');

            Route::get('/{post}', [PostController::class , 'show'])->name('show');

            Route::get('/{post}/edit', [PostController::class , 'edit'])->name('edit');
            Route::put('/{post}', [PostController::class , 'update'])->name('update');

            Route::delete('/{post}', [PostController::class , 'destroy'])->name('destroy');
        });
    });
});

require __DIR__ . '/auth.php';
