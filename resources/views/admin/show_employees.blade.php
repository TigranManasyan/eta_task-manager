@extends('layouts.app')

@section('content')
    <h1>Список сотрудников</h1>
    
    <ul>
        @foreach($employees as $employee)
            <li>{{ $employee->first_name }} {{ $employee->last_name }} - {{ $employee->position->name }}</li>
        @endforeach
    </ul>
@endsection
