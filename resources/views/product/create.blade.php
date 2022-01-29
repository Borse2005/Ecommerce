<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div style="width: 700px" class="mx-auto">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('product.form')
                    <div class="mt-5">
                        <div class="grid grid-cols-5 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="image" class="block text-sm font-medium text-gray-700">Select Image</label>
                                <input type="file" name="image[]" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block  sm:text-sm border-gray-300  " multiple>
                            </div>
                        </div>
                        @error('image')
                            <div class="text-red-500 font-bold mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                    <a href="{{ route('product.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Back</a>
                </div>
            </div>
                </form>
            </div>
        </div>
    </div>

@section('script')
<script>
    ClassicEditor
    .create( document.querySelector( '#highlight' ) )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#specifications' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
@endsection
</x-app-layout>
