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
        <div class="mt-3">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                    <input type="text" name="brand" id="brand" autocomplete="given-name" value="{{ old('brand',optional($products ?? null)->brand)}}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('brand') border-red-500 @enderror">
                </div>
            </div>
            @error('brand')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" id="price" autocomplete="given-name" value="{{ old('price',optional($products ?? null)->price)}}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('price') border-red-500 @enderror">
                </div>
            </div>
            @error('price')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
                    <input type="text" name="discount" id="discount" autocomplete="given-name" value="{{ old('discount',optional($products ?? null)->discount)}}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('discount') border-red-500 @enderror">
                </div>
            </div>
            @error('discount')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="text" name="stock" id="stock" autocomplete="given-name" value="{{ old('stock',optional($products ?? null)->stock)}}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('stock') border-red-500 @enderror">
                </div>
            </div>
            @error('stock')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" name="color" id="color" autocomplete="given-name" value="{{ old('color',optional($products ?? null)->color)}}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('color') border-red-500 @enderror">
                </div>
            </div>
            @error('color')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mt-3">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" cols="10" rows="5"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('description') border-red-500 @enderror">{{ old('description', optional($products ?? null)->description) }}</textarea>
                </div>
            </div>
            @error('description')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mt-5">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumnail Image</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block  sm:text-sm border-gray-300  @error('thumbnail') border-red-500 @enderror">
                </div>
            </div>
            @error('thumbnail')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>

