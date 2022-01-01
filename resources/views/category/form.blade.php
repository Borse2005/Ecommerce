<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-9 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" name="category" id="category" autocomplete="given-name" value="{{ old('category') }}"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('category') border-red-500 @enderror">
            </div>
        </div>
        @error('category')
            <div class="text-red-500 font-bold mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
        </button>
    </div>
</div>
