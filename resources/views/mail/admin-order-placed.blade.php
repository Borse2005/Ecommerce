@component('mail::message')
# Order

New Order Placed

@component('mail::button', ['url' => 'http://127.0.0.1:8000/order'])
View new order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
