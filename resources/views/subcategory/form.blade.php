<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-9 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="subcategory" class="block text-sm font-medium text-gray-700">Subcategory</label>
                <input type="text" name="subcategory" id="subcategory" autocomplete="given-name" value="{{ old('subcategory', optional($subcategory ?? null)->subcategory) }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('subcategory') border-red-500 @enderror">
            </div>
        </div>
        @error('subcategory')
            <div class="text-red-500 font-bold mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    
</div>
