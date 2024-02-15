<!-- resources/views/invite.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приглашение в систему</title>
</head>
<body>
    <h1>Пригласить нового сотрудника</h1>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('invite.send') }}" method="POST">
        @csrf
        <label for="email">Email сотрудника:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required><br><br>
        <button type="submit">Отправить приглашение</button>
    </form>
</body>
</html>
