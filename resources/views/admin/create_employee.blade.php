@extends('layouts.app')

@section('content')
    <h1>Добавление нового сотрудника</h1>

    <form action="{{ route('admin.add_employee') }}" method="post">
        @csrf
        <label for="first_name">Имя:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Фамилия:</label>
        <input type="text" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required>

        <label for="position_id">Должность:</label>
        <select name="position_id" required>
            @foreach($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
        </select>

        <button type="submit">Добавить сотрудника</button>
    </form>
@endsection
