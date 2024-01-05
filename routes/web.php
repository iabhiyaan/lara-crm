<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FolderController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('optimize-clear', function () {
    Artisan::call('optimize:clear');
    dd(Artisan::output());
    // return redirect()->route('home');
});

Route::group([], function () {
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('postLogin', [LoginController::class, 'postLogin'])->name('admin.postLogin');
    Route::get('password-reset', [PasswordResetController::class, 'resetForm'])->name('password-reset');
    Route::post('send-email-link', [PasswordResetController::class, 'sendEmailLink'])->name('sendEmailLink');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'passwordResetForm'])->name('passwordResetForm');
    Route::post('update-password', [PasswordResetController::class, 'updatePassword'])->name('updatePassword');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:super-admin', 'role:system_admin']], function () {
    Route::get('logout', [LoginController::class, 'admin__logout'])->name('admin.logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('folder', FolderController::class);
    Route::resource('leads', LeadController::class);
});

