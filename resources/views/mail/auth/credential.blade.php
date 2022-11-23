@component('mail::message')
Dear {{ $notifiable->first_name }},

You have receiving this email because admin have created your account. After login please change the password please. This is your login credential

Email : {{ $notifiable->email }}
Password: {{ $credential['password'] }}

@component('mail::button', ['url' => route('login')])<br>
Click here to Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
