<?php
// app/Http/Controllers/InvitationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InvitationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function showInviteForm()
    {
        return view('invite'); // Создайте представление для этой формы
    }

    public function sendInvitation(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create([
            'email' => $request->email,
            // Другие поля пользователя, если необходимо
        ]);

        Mail::to($user->email)->send(new InvitationEmail($user));

        return redirect()->route('invite.form')->with('success', 'Приглашение успешно отправлено');
    }
}
