@component('mail::message')
# Thanks for signing up

You are now registered and can start using the service ASAP.

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Visit Cajic-Gram
@endcomponent

Thanks,<br>
Dino Cajic
@endcomponent
