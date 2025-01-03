<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\Features\FeatureController;
use App\Http\Controllers\Admin\Members\MemberController;
use App\Http\Controllers\Admin\Messages\MessageController;
use App\Http\Controllers\Admin\Services\ServiceController;
use App\Http\Controllers\Admin\Settings\SettingController;
use App\Http\Controllers\Admin\Subscribers\SubscriberController;
use App\Http\Controllers\Admin\Testmonials\TestmonialController;
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
    /*================================= Messages Routes===============================*/
        Route::controller(MessageController::class)->group(function () {
            Route::resource('messages', MessageController::class)->except('edit','update');
    });
    /*================================= Subscribers Routes===============================*/
        Route::controller(SubscriberController::class)->group(function () {
            Route::resource('subscribers', SubscriberController::class)->only('index','destroy');
    });
    /*================================= Testmonials Routes===============================*/
        Route::controller(TestmonialController::class)->group(function () {
            Route::resource('testmonials', TestmonialController::class);
    });
    /*================================= Members Routes===============================*/
        Route::controller(MemberController::class)->group(function () {
            Route::resource('members', MemberController::class);
    });
    /*================================= settings Routes===============================*/
        Route::controller(SettingController::class)->group(function () {
            Route::resource('settings', SettingController::class)->only(['index','update']);
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
