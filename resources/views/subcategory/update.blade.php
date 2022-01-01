<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div style="width: 600px" class="mx-auto">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('subcategory.form')
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                        <a href="{{ route('subcategory.show',$subcategory->category_id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
