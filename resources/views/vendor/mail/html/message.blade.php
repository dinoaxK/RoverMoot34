@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
Please do not reply to this email as it is an auto generated email and cannot be responded to. <br>
If you feel you are recieving this due to a mistake ,please ignore this email. <br>
Copyright &copy;  {{ now()->year }}<strong><a target="_blank" href=""> SLSA</a> </strong>. All Rights Reserved
<br>
<br>

@endcomponent
@endslot
@endcomponent
