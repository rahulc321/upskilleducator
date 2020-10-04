@component('mail::message')
# Hi {{ $user->fullname }} ,

We received a request to reset your upskill educator password. Click below to reset your password.

@component('mail::button', ['url' => $user->url])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
