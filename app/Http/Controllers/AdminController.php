<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Position;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeNotification;

class AdminController extends Controller
{
    public function showEmployees()
    {
        $employees = User::where('position_id', '!=', null)->get();

        return view('admin.show_employees', ['employees' => $employees]);
    }

    public function createEmployeeForm()
    {
        $positions = Position::all();

        return view('admin.create_employee', ['positions' => $positions]);
    }

    public function addEmployee(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'position_id' => 'required|exists:positions,id',
        ]);

        // Создание нового сотрудника
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'position_id' => $validatedData['position_id'],
        ]);

        // Отправка приветственного уведомления
        $user->notify(new WelcomeNotification($user));

        return redirect()->route('admin.show_employees')->with('success', 'Сотрудник успешно добавлен');
    }

    // Дополнительные методы...
}
