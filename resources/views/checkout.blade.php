<x-app-layout>
    @if (session('details'))
        <div class=" time p-5">
            <div class=" max-w-sm mx-auto  rounded-lg shadow-lg flex items-center space-x-4 "
                style="background-color: #5bc0de; padding: 10px">
                <div class="mx-auto">
                    <div class="text-center font-bold">{{ session('details') }}</div>
                </div>
            </div>
        </div>
    @endif

    <div class="w-3/4 mx-auto m-5">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Address Information</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            @foreach ($user->address as $address)
                                <div class="col-span-6 sm:col-span-3">
                                    <div class="flex">
                                        <input id="remember-me" name="remember-me" type="radio"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mt-3">
                                        <label class="ml-4 block text-sm text-gray-900">
                                            <span class="font-semibold">{{ $address->name }} <span
                                                    class="ml-5">{{ $address->phone }}</span></span>
                                            <br>
                                            {{ $address->address }}, {{ $address->city }},
                                            {{ $address->district }}, {{ $address->state }}
                                        </label>
                                        <a href="{{ route('address.edit', $address->id) }}"
                                            class="font-medium text-indigo-600 hover:text-indigo-500 ml-auto cursor-pointer">
                                            Edit
                                        </a>
                                        <form action="{{ route('address.destroy', $address->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" value="Remove"
                                                class="font-medium text-indigo-600 hover:text-indigo-500 mx-2 cursor-pointer">
                                        </form>
                                    </div>
                                </div>

                                <div class="hidden sm:block" aria-hidden="true">
                                    <div class="py-5">
                                        <div class="border-t border-gray-200"></div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="flex">
                                <a href="#" id="add" class="font-medium text-indigo-600 hover:text-indigo-500  ml-auto">
                                    New Address
                                </a>
                            </div>

                            <div class="hidden" id="adding">
                                <div class="mt-5 md:mt-0 md:col-span-6">
                                    <form action="{{ route('address.store') }}" method="POST">
                                        @csrf
                                        <div class="">
                                            <div class="px-4 py-5 bg-white sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="name"
                                                            class="block text-sm font-medium text-gray-700">Full
                                                            name</label>
                                                        <input type="text" name="name" id="name"
                                                            autocomplete="given-name" value="{{ old('name') }}"
                                                            required
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('name')
                                                            <div class="text-red-600 mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="phone"
                                                            class="block text-sm font-medium text-gray-700">Phone
                                                            Number
                                                        </label>
                                                        <input type="text" name="phone" id="phone" autocomplete="phone"
                                                            required value="{{ old('phone') }}"
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('phone')
                                                            <div class="text-red-600 mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="alternate_phone"
                                                            class="block text-sm font-medium text-gray-700">Alternate
                                                            Mobile</label>
                                                        <input type="text" name="alternate_phone" id="alternate_phone"
                                                            required autocomplete="given-name"
                                                            value="{{ old('alternate_phone') }}"
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('alternate_phone')
                                                            <div class="text-red-600  mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-3">
                                                        <label for="address"
                                                            class="block text-sm font-medium text-gray-700">Address</label>
                                                        <input type="text" name="address" id="address"
                                                            value="{{ old('address') }}"
                                                            autocomplete="street-address" required
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('address')
                                                            <div class="text-red-600 mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                        <label for="city"
                                                            class="block text-sm font-medium text-gray-700">City</label>
                                                        <input type="text" name="city" id="city"
                                                            autocomplete="address-level2" required
                                                            value="{{ old('city') }}"
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('city')
                                                            <div class="text-red-600  mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                        <label for="district"
                                                            class="block text-sm font-medium text-gray-700">District</label>
                                                        <input type="text" name="district" id="district"
                                                            autocomplete="address-level2"
                                                            value="{{ old('district') }}" required
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('district')
                                                            <div class="text-red-600  mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                                        <label for="region"
                                                            class="block text-sm font-medium text-gray-700">State /
                                                            Province</label>
                                                        <input type="text" name="state" id="region"
                                                            autocomplete="address-level1" required
                                                            value="{{ old('state') }}"
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('state')
                                                            <div class="text-red-600  mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                                        <label for="postal-code"
                                                            class="block text-sm font-medium text-gray-700">ZIP/ Postal
                                                            code</label>
                                                        <input type="text" name="pincode" id="postal-code"
                                                            value="{{ old('pincode') }}" autocomplete="postal-code"
                                                            required
                                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @error('pincode')
                                                            <div class="text-red-600  mt-1 font-medium">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                                <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="w-3/4 pb-16 mx-auto">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Total Product</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2 bg-white border rounded">
                    <div class="flow-root p-5">
                        @foreach ($cart as $product)
                            @if ($session == $product->session or $product->user_id == $user->id)
                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                    <li class="py-6 flex">
                                        <div
                                            class="flex-shrink-0 w-24 h-28 border border-gray-200 rounded-md overflow-hidden">
                                            <img src="{{ Storage::disk('public')->url($product->product->thumbnail) }}"
                                                alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                class="w-full h-full object-center object-cover">
                                        </div>
                                        <div class="ml-4 flex-1 flex flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="#">
                                                            {{ $product->product->product }}
                                                        </a>
                                                    </h3>
                                                    <p class="ml-4 text-lg">
                                                        ₹{{ number_format(($product->product->price - $product->product->discount) * $product->qty) }}
                                                    </p>
                                                </div>
                                                <div class="flex flex-1 text-base  font-medium text-gray-900">
                                                    <p class="mt-1 mb-3 text-sm text-gray-500">
                                                        Color : {{ $product->product->color->color }}
                                                    </p>
                                                    <div class="ml-auto">
                                                        <del class="ml-4 text-slate-400 text-left">
                                                            ₹{{ number_format($product->product->discount * $product->qty) }}
                                                        </del>
                                                    </div>
                                                    <p class="ml-4 text-green-600">
                                                        {{ number_format(($product->product->discount / $product->product->price) * 100) }}% off
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex-1 flex items-end justify-between text-sm">
                                                <div class="flex">
                                                    <form action="{{ route('cart.update', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("PUT")
                                                        <input type="number" name="quantity" id="quantity"
                                                            value="{{ $product->qty }}" min="1"
                                                            max="{{ $product->product->stock }}"
                                                            class="w-20 h-9 rounded cursor-default da-num " onchange="this.form.submit();" onkeydown="return false">
                                                    </form>
                                                </div>
                                                <div class="flex">
                                                    <form action="{{ route('cart.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <input type="submit" value="Remove"
                                                            class="font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="py-5">
                                    <div class="border-t border-gray-200"></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="w-3/4 pb-16 mx-auto">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Payment Information</h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="flex items-center">
                                        <input id="remember-me" name="remember-me" type="radio"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                            Cash on delivery
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="remember-me" name="remember-me" type="radio"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                            Net Banking
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="remember-me" name="remember-me" type="radio"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                            UPI
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
