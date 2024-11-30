<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
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
    })->name('home');});
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('login', [AdminAuthController::class,'login'])->name('login');
        Route::post('store', [AdminAuthController::class,'store'])->name('store');

    });
});
