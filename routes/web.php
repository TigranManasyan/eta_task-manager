<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColleagueController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\EmailController;



// Маршруты для аутентификации
Auth::routes();

// Маршрут для отображения формы приглашения
Route::get('/invite', [InvitationController::class, 'showInviteForm'])->name('invite.form');
Route::post('/send-email', [EmailController::class, 'sendEmail']);

// Маршрут для отправки приглашения
Route::post('/invite/send', [InvitationController::class, 'sendInvitation'])->name('invite.send');

// Маршруты для администратора
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/show_employees', [AdminController::class, 'showEmployees'])->name('admin.show_employees');
    Route::get('/admin/create_employee', [AdminController::class, 'createEmployee'])->name('admin.create_employee');
    Route::post('/admin/add_employee', [AdminController::class, 'addEmployee'])->name('admin.add_employee');
    // Другие маршруты для администратора
});

// Маршруты для коллег
Route::middleware(['auth', 'colleague'])->group(function () {
    Route::get('/colleague/dashboard', [ColleagueController::class, 'dashboard'])->name('colleague.dashboard');
    Route::get('/colleague/show_tasks', [ColleagueController::class, 'showTasks'])->name('colleague.show_tasks');
    // Другие маршруты для коллег
});

// Маршруты для бухгалтера
Route::middleware(['auth', 'accountant'])->group(function () {
    Route::get('/accountant/dashboard', [AccountantController::class, 'dashboard'])->name('accountant.dashboard');
    Route::get('/accountant/show_financial_data', [AccountantController::class, 'showFinancialData'])->name('accountant.show_financial_data');
    // Другие маршруты для бухгалтера
});

// Общие маршруты для всех пользователей
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    // Другие общие маршруты
});

// Маршрут для выхода из системы
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
