<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\Features\FeatureController;
use App\Http\Controllers\Admin\Services\ServiceController;
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
    /*================================= Services Routes===============================*/
        Route::controller(ServiceController::class)->group(function () {
            Route::resource('services', ServiceController::class);
            Route::get('services/restore/{Service}', 'restore')->name('service.restore');
            Route::delete('services/force-delete/{Service}','forceDelete')->name('service.force-delete');
    });
    /*================================= Feature Routes===============================*/
        Route::controller(FeatureController::class)->group(function () {
            Route::resource('features', FeatureController::class);
            Route::get('features/restore/{Feature}', 'restore')->name('features.restore');
            Route::delete('features/force-delete/{Service}','forceDelete')->name('features.force-delete');
    });
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
