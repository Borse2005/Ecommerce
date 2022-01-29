@component('mail::message')
# Order Update

Your Product has been {{ $order->status->status }}


@component('mail::button', ['url' => 'http://127.0.0.1:8000/history'])
View Product
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
