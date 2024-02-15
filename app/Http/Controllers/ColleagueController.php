<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ColleagueController extends Controller
{
    public function showTasks()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();

        return view('colleague.show_tasks', ['tasks' => $tasks]);
    }

    public function updateTaskStatus(Request $request)
    {
        $task = Task::find($request->input('task_id'));

        // Проверка, что задача принадлежит текущему пользователю
        if ($task && $task->user_id == auth()->user()->id) {
            $task->status = $request->input('status');
            $task->save();

            return redirect()->route('colleague.show_tasks')->with('success', 'Статус задачи успешно обновлен');
        } else {
            return redirect()->route('colleague.show_tasks')->with('error', 'Невозможно обновить статус задачи');
        }
    }

    // Дополнительные методы...
}
