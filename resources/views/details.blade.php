<x-app-layout>
    <div class="bg-white">
            @if (session('cart'))
            <div class=" time p-5">
                <div class=" max-w-sm mx-auto  rounded-lg shadow-lg flex items-center space-x-4 "
                    style="background-color: #5bc0de; padding: 10px">
                    <div class="mx-auto">
                        <div class="text-center font-bold">{{ session('cart') }}</div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card-wrapper ">

            <div class="card">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            @foreach ($product->image as $image)
                                <img src="{{ Storage::disk('public')->url($image->image) }}" alt="shoe image"
                                    style="height: 600px; " class="border-y-4">
                            @endforeach
                        </div>
                    </div>
                    <div class="img-select mt-2">
                        @foreach ($product->image as $image)
                            <div class="img-item">
                                <a href="#" data-id="{{ $key++ }}">
                                    <img src="{{ Storage::disk('public')->url($image->image) }}" alt="shoe image"
                                        class="rounded-sm border-4 " style="width: 2000px; height: 100px">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- card right -->
                <div class="product-content">
                    <h2 class="text-3xl font-bold cursor-default">{{ $product->product }}</h2>
                    <span
                        class="mt-6 cursor-default inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-green-600 rounded-full">4.5
                        <i class="fa fa-star pl-2"></i></span>

                    <div class="mt-2 cursor-default text-green-600 font-medium">
                        Extra ₹{{ $product->discount }} Off
                    </div>
                    <span
                        class=" text-3xl cursor-default font-semibold">₹{{ number_format($product->price - $product->discount) }}</span>
                    <span class="text-lg px-2 text-gray-500 cursor-default">
                        <del>₹{{ number_format($product->price) }}</del>
                    </span>
                    <span
                        class="text-lg text-green-600 font-semibold cursor-default">{{ ceil(($product->discount / $product->price) * 100) }}%
                        off
                    </span>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white overflow-hidden sm:rounded-lg  mt-6 cursor-default">
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Color
                                    </dt>
                                    <dd class="mt-1 text-sm font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $product->color }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white  overflow-hidden sm:rounded-lg cursor-default">
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Highlight
                                    </dt>
                                    <dd style="list-style: disc; margin-left: 150px; margin-top: -20px">
                                        {!! $product->highlight !!}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    {{-- <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-white px-4 py-5 sm:grid  sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Specifications
                                    </dt>
                                    <dd style="margin-left: 140px">
                                        {!! $product->specifications !!}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div> --}}
                    <hr class="mb-6">
                    <a href=""
                        class="h-10 px-5 m-2 p-3 text-indigo-100 transition-colors duration-150 bg-orange-400 rounded-lg focus:shadow-outline hover:bg-orange-600 hover:text-black hover:font-bold">{{ __('Buy Now') }}</a>
                    <a href="{{ route('cart.show', $product->id) }}"
                        class="h-10 p-3 px-5 m-2 text-indigo-100 transition-colors duration-150 bg-orange-600 rounded-lg focus:shadow-outline hover:bg-orange-800 hover:text-black hover:font-bold">{{ __('Add to cart') }}</a>
                </div>
            </div>
        </div>

    </div>
    <hr class="p-6 bg-white">
    {{-- Comment --}}
    <div class="bg-white">
        <div class="lg:col-span-2 lg:border lg:border-gray-200 lg:pr-8 w-3/4 mx-auto ">
            <div class="m-10">
                <section aria-labelledby="reviews-heading" class=" border-gray-200 pt-10 lg:pt-6 pb-6">
                    <h2 id="reviews-heading" class="text-center m-2 font-bold">{{ __('Comment') }}</h2>
                    <div class="space-y-10">
                        <div class="flex flex-col sm:flex-row">
                            <div class="mt-6 order-2 sm:mt-0 sm:ml-16">
                                <h3 class="text-sm font-medium text-gray-900">This is the best white t-shirt out there
                                </h3>
                                <p class="sr-only">5 out of 5 stars</p>
                                <div class="mt-3 space-y-6 text-sm text-gray-600">
                                    <p>I've searched my entire life for a t-shirt that reflects every color in the
                                        visible
                                        spectrum. Scientists said it couldn't be done, but when I look at this shirt, I
                                        see
                                        white light bouncing right back into my eyes. Incredible!</p>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="flex flex-col sm:flex-row">
                            <div class="mt-6 order-2 sm:mt-0 sm:ml-16">
                                <h3 class="text-sm font-medium text-gray-900">Adds the perfect variety to my wardrobe
                                </h3>
                                <p class="sr-only">4 out of 5 stars</p>
                                <div class="mt-3 space-y-6 text-sm text-gray-600">
                                    <p>I used to be one of those unbearable minimalists who only wore the same black
                                        v-necks
                                        every day. Now, I have expanded my wardrobe with three new crewneck options!
                                        Leaving off
                                        one star only because I wish the heather gray was more gray.</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="flex flex-col sm:flex-row">
                            <div class="mt-6 order-2 sm:mt-0 sm:ml-16">
                                <h3 class="text-sm font-medium text-gray-900">All good things come in 6-Packs</h3>
                                <p class="sr-only">5 out of 5 stars</p>
                                <div class="mt-3 space-y-6 text-sm text-gray-600">
                                    <p>Tasty beverages, strong abs that will never be seen due to aforementioned tasty
                                        beverages, and these Basic Tees!</p>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    <hr class="my-6">
    {{-- Product List --}}
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-6 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-2">
            <h2 class="py-6 font-bold">Related Products </h2>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Earthen Bottle
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $48
                    </p>
                </a>

                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg"
                            alt="Olive drab green insulated bottle with flared screw lid and flat top."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Nomad Tumbler
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $35
                    </p>
                </a>

                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg"
                            alt="Person using a pen to cross a task off a productivity paper card."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Focus Paper Refill
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $89
                    </p>
                </a>

                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg"
                            alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Machined Mechanical Pencil
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $35
                    </p>
                </a>

                <!-- More products... -->
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-6 px-4 sm:py-6 sm:px-6 lg:max-w-7xl lg:px-2">
            <h2 class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Earthen Bottle
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $48
                    </p>
                </a>

                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg"
                            alt="Olive drab green insulated bottle with flared screw lid and flat top."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Nomad Tumbler
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $35
                    </p>
                </a>

                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg"
                            alt="Person using a pen to cross a task off a productivity paper card."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Focus Paper Refill
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $89
                    </p>
                </a>

                <a href="#" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg"
                            alt="Hand holding black machined steel mechanical pencil with brass tip and top."
                            class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700">
                        Machined Mechanical Pencil
                    </h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">
                        $35
                    </p>
                </a>

                <!-- More products... -->
            </div>
        </div>
    </div>

    @section('script')
        <script>
            const imgs = document.querySelectorAll(".img-select a");
            const imgBtns = [...imgs];
            let imgId = 1;

            imgBtns.forEach((imgItem) => {
                imgItem.addEventListener("click", (event) => {
                    event.preventDefault();
                    imgId = imgItem.dataset.id;
                    slideImage();
                });
            });

            function slideImage() {
                const displayWidth = document.querySelector(".img-showcase img:first-child")
                    .clientWidth;

                document.querySelector(".img-showcase").style.transform = `translateX(${-(imgId - 1) * displayWidth }px)`;
            }

            window.addEventListener("resize", slideImage);
        </script>
    @endsection
</x-app-layout>
