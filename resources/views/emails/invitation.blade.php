<!-- resources/views/emails/invitation.blade.php -->

@component('mail::message')
# Приглашение в систему

Вы получили это письмо, так как вас пригласили присоединиться к нашей системе.

Для завершения регистрации нажмите на кнопку ниже:

@component('mail::button', ['url' => $invitationLink])
Присоединиться
@endcomponent

Благодарим вас за выбор нашей компании!

С уважением,<br>
{{ config('app.name') }}
@endcomponent
