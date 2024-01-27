<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employee_id' => 'required|exists:employees,id',
            // Добавьте другие правила валидации при необходимости
        ]);

        $task = Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Задача успешно создана.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'employee_id' => 'required|exists:employees,id',
            // Добавьте другие правила валидации при необходимости
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Задача успешно обновлена.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Задача успешно удалена.');
    }
}

