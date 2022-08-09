@component('mail::message')
# Happy Birthday {{$customer->first_name}}

We wish you a very happy birthday {{$customer->first_name}} {{$customer->last_name}}

@component('mail::button', ['url' => ''])
Birthday Present
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
