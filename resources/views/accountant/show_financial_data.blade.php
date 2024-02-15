@extends('layouts.app')

@section('content')
    <h1>Финансовые данные</h1>
    
    <ul>
        @foreach($financialData as $data)
            <li>{{ $data->description }} - {{ $data->amount }}</li>
        @endforeach
    </ul>
@endsection

