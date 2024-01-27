<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/send', [NotificationController::class, 'sendNotification'])->name('notifications.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
