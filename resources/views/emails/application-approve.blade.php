@component('mail::message')
Hello {{ $participant->first_name }}

Your application has been Approved! Click below to check if your registration is approved! 

@component('mail::button', ['url' => route('moot.register') ])
Check Registration Status
@endcomponent


Thanks,<br>
{{ config('app.name') }}

If you’re having trouble clicking the "Check Registration Status" button, copy and paste the URL below into your web browser:
<a href="{{ route('moot.register') }}">{{ route('moot.register') }}</a>
@endcomponent
