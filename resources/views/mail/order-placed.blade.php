@component('mail::message')
# Ecommerce

Your Order has been placed

@component('mail::button', ['url' => 'http://127.0.0.1:8000/history'])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
