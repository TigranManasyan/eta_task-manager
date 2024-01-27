<!-- resources/views/notifications/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>
<body>
    <h1>Notifications</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ route('notifications.send') }}">
        @csrf
        <label for="message">Сообщение:</label>
        <input type="text" name="message" required>
        <button type="submit">Отправить уведомление</button>
    </form>


    <h2>User</h2>
    @if(isset($user))
        <p>{{ $user->name }}</p>
    @else
        <p>User not found</p>
    @endif

</body>
</html>

