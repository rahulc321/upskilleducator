@component('mail::message')
# Hello {{ $user->fullname }}

Welcome to Upskill Educator. You have successfully register at Upskill Educator.

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
