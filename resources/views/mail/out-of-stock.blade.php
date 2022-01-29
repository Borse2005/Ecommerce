@component('mail::message')
# Out of Stock

Product Name : {{ $product->product }}

<img src="{{ Storage::disk('public')->url($product->thumbnail) }}" class="text-center" alt="Product image">

@component('mail::button', ['url' => 'http://127.0.0.1:8000/product'])
View Product
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
