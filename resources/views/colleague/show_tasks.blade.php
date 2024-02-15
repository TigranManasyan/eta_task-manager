@extends('layouts.app')

@section('content')
    <h1>Ваши задачи</h1>
    
    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->text }} - {{ $task->status }}
                <form action="{{ route('colleague.update_task_status') }}" method="post">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    <select name="status" onchange="this.form.submit()">
                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>В работе</option>
                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Завершено</option>
                    </select>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
