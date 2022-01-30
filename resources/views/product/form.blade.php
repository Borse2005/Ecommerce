<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div>
            <div class="grid grid-cols-0 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="product" class="block text-sm font-medium text-gray-700">Product</label>
                    <input type="text" name="product" id="product" autocomplete="given-name"
                        value="{{ old('product', optional($products ?? null)->product) }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">
                </div>
            </div>
            @error('product')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
            @livewire('add-product', ['selectedCity' => $products->id ?? null])
            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price" autocomplete="given-name"
                            value="{{ old('price', optional($products ?? null)->price) }}"
                            class="mt-1 currency focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">
                    </div>
                </div>
                @error('price')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                        <input type="number" name="discount" id="discount" autocomplete="given-name"
                            value="{{ old('discount', optional($products ?? null)->discount) }}"
                            class="mt-1 currency focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">
                    </div>
                </div>
                @error('discount')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="text" name="stock" id="stock" autocomplete="given-name"
                            value="{{ old('stock', optional($products ?? null)->stock) }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">
                    </div>
                </div>
                @error('stock')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                        <select type="text" name="color_id" id="color" autocomplete="color"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">
                            <option selected disabled>Select Color</option>
                            @foreach ($color as $colors)
                                <option value="{{ $colors->id }}"
                                    {{ old('color_id', optional($colored ?? null)->id) == $colors->id ? 'selected' : '' }}>
                                    {{ $colors->color }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('color_id')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="highlight" class="block text-sm font-medium text-gray-700 pb-3">Highlights</label>
                        <textarea name="highlight" id="highlight" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">{!! old('highlight', optional($products ?? null)->highlight) !!}</textarea>
                    </div>
                </div>
                @error('highlight')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="specifications"
                            class="block text-sm font-medium text-gray-700 pb-3">Specifications</label>
                        <textarea name="specifications" id="specifications" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md ">{!! old('specifications', optional($products ?? null)->specifications) !!}</textarea>
                    </div>
                </div>
                @error('specifications')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-3">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm p-2 sm:text-sm border-gray-300 rounded-md ">{!! old('description', optional($products ?? null)->description) !!}</textarea>
                    </div>
                </div>
                @error('description')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @if (optional($products ?? null)->thumbnail != null)
                <div class="flex -space-x-1 overflow-hidden px-6 pt-6">
                    <img class="inline-block h-24 w-24 rounded-lg  ring-white"
                        src="{{ Storage::disk('public')->url($products->thumbnail) }}" alt="">
                </div>
            @endif

            <div class="mt-5">
                <div class="grid grid-cols-0 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumnail Image</label>
                        <input type="file" name="thumbnail" maxlength="2" id="thumbnail"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block  sm:text-sm border-gray-300  ">
                    </div>
                </div>
                @error('thumbnail')
                    <div class="text-red-500 font-bold mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
