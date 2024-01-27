<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'department_id' => 'required|exists:departments,id',
            // Добавьте другие правила валидации при необходимости
        ]);

        $employee = Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Сотрудник успешно создан.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'department_id' => 'required|exists:departments,id',
            // Добавьте другие правила валидации при необходимости
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Сотрудник успешно обновлен.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Сотрудник успешно удален.');
    }
}
