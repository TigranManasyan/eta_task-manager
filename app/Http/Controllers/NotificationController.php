<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Notifications\CustomNotification;
use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    public function index()
    {
        $user = User::find(2); // Ищем пользователя по id (в данном случае 2)
        return view('notifications.index', compact('user'));
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $user = User::find(2); // Ищем пользователя по id (в данном случае 2)

        // Отправить уведомление пользователю
        Notification::send($user, new CustomNotification($request->input('message')));

        return redirect()->route('notifications.index')
            ->with('success', 'Уведомление успешно отправлено пользователю.');
    }
}
