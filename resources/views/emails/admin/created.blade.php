@component('mail::message')
Hello {{ $details['name'] }},

You have been granted an admin account!

Click the button below and use below details to login.

Email: {{ $details['email'] }} <br>
password: {{ $details['password'] }}

Once you login, please change your password as you prefer. 

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

If you’re having trouble clicking the "Login" button, copy and paste the URL below into your web browser:
<a href="{{ route('login') }}">{{ route('login') }}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
