@component('mail::message')
Hello {{ $details['name'] }},

{{ $details['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
