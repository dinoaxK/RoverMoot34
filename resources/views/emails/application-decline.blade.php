@component('mail::message')
Hello {{ $details['first_name'] }}

Your application was declined due to {{ $details['message'] }}

@component('mail::button', ['url' => route('moot.register')])
Re-Submit Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}

If you’re having trouble clicking the "Re-Submit Application" button, copy and paste the URL below into your web browser:
<a href="{{ route('moot.register') }}">{{ route('moot.register') }}</a>
@endcomponent
