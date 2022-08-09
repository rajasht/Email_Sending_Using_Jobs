@component('mail::message')
# Happy Birthday {{$name}}

We wish you a very happy birthday Mr. Sagnik Mandal Sir.

@component('mail::button', ['url' => ''])
Birthday Present
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
