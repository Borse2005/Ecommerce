<x-app-layout>
    <div class="mx-auto">
        <div class="w-2/4 pb-16 mx-auto m-3">
            <div class="mt-10 sm:mt-0">

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('address.update',$address->id) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Full
                                            name</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name"
                                            value="{{ old('name',optional($address ?? null)->name) }}" required
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        @error('name')
                                            <div class="text-red-600 mt-1 font-medium">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone
                                            Number
                                        </label>
                                        <input type="text" name="phone" id="phone" autocomplete="phone" required
                                            value="{{ old('phone',optional($address ?? null)->phone) }}"
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
                                        <input type="text" name="alternate_phone" id="alternate_phone" required
                                            autocomplete="given-name" value="{{ old('alternate_phone',optional($address ?? null)->alternate_phone) }}"
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
                                        <input type="text" name="address" id="address" value="{{ old('address',optional($address ?? null)->address) }}"
                                            autocomplete="street-address" required
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        @error('address')
                                            <div class="text-red-600 mt-1 font-medium">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                        <input type="text" name="city" id="city" autocomplete="address-level2" required
                                            value="{{ old('city',optional($address ?? null)->city) }}"
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
                                        <input type="text" name="district" id="district" autocomplete="address-level2"
                                            value="{{ old('district',optional($address ?? null)->district) }}" required
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        @error('district')
                                            <div class="text-red-600  mt-1 font-medium">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                        <label for="region" class="block text-sm font-medium text-gray-700">State /
                                            Province</label>
                                        <input type="text" name="state" id="region" autocomplete="address-level1"
                                            required value="{{ old('state',optional($address ?? null)->state) }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        @error('state')
                                            <div class="text-red-600  mt-1 font-medium">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                        <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP/
                                            Postal code</label>
                                        <input type="text" name="pincode" id="postal-code"
                                            value="{{ old('pincode',optional($address ?? null)->pincode) }}" autocomplete="postal-code" required
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
                                <a href="{{ route('user.create') }}" 
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-800 dark:border-gray-700">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
