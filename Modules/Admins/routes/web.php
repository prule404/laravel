<?php

use Illuminate\Support\Facades\Route;
use Modules\Admins\App\Http\Controllers\AdminsController;
use Modules\Admins\App\Http\Middleware\IsAdmin;

Route::middleware([IsAdmin::class , 'auth'])->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [AdminsController::class , 'index'])->name('dashboard');

            Route::view('/user-datatable', 'admins::user-datatable')->name('user.datatable');
            Route::view('/post-datatable', 'admins::post-datatable')->name('post.datatable');
    });
});
