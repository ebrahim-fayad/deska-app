<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('admin')->name('admin.')->group(function ()  {
    Route::middleware(['admin'])->group(function () {
    Route::get('/', function () {
        return view('Back.Pages.index');
    })->name('home');
    Route::post('logout', [AdminAuthController::class,'logout'])->name('logout');
});
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('login', [AdminAuthController::class,'login'])->name('login');
        Route::post('store', [AdminAuthController::class,'store'])->name('store');
        /*=========================== reset password ============== */
        Route::get('forgot-password', [AdminForgotPasswordController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [AdminForgotPasswordController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'sendLink'])
            ->name('password.reset');

        Route::post('reset-password', [AdminForgotPasswordController::class, 'edit'])
            ->name('password.store');
    });
});
