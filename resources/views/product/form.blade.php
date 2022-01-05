<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div>
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="product" class="block text-sm font-medium text-gray-700">Product</label>
                    <input type="text" name="product" id="product" autocomplete="given-name" value="{{ old('product',optional($products ?? null)->product)}}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('product') border-red-500 @enderror">
                </div>
            </div>
            @error('product')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @livewire('add-product', ['selectedCity' => $products->id ?? null])
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
        </button>
        <a href="" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Back</a>
    </div>
</div>
