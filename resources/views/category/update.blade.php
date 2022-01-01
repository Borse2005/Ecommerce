<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div style="width: 600px" class="mx-auto">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('category.update',$category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('category.form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
