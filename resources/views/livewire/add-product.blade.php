<div>
    <div class="mt-5">
        <div class="grid grid-cols-0 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Select Category</label>
                <select name="category_id" id="category_id" wire:model="selectedCountry"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm p-2 rounded-md @error('category_id') border-gray-300 @enderror">
                    <option value="">Select Category</option>
                    @foreach ($category as $categories)
                        <option value="{{ $categories->id }}"> {{ $categories->category }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('category_id')
            <div class="text-red-500 font-bold mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    @if (!is_null($selectedCountry))
        <div class="mt-5">
            <div class="grid grid-cols-0 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="subcategory_id" class="block text-sm font-medium text-gray-700">Select Category</label>
                    <select name="subcategory_id" id="subcategory_id" wire:model="selectedSubcategory"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm p-2 rounded-md @error('subcategory_id') border-gray-300 @enderror">
                        <option value="" selected>Select Category</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" >{{ $subcategory->subcategory }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('subcategory_id')
                <div class="text-red-500 font-bold mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
    @endif
</div>
