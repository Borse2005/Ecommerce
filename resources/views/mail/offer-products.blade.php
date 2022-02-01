@component('mail::message')
# Offer Offer

Save the money

<img src="{{ Storage::disk()->url($product->thumbnail) }}" alt="">

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
View Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
