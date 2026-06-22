<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PolyclinicController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\SettingController;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::resource('services', ServiceController::class);
        Route::resource('polyclinics', PolyclinicController::class);
        Route::resource('doctors', DoctorController::class);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('announcements', AnnouncementController::class);
        Route::resource('settings', SettingController::class);
        });