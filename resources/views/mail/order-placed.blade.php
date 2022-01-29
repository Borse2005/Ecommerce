@component('mail::message')
# Ecommerce

Your Order has been placed

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
