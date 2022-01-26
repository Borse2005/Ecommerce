<x-app-layout>
    <div class="mx-auto">
        <div class="w-2/4 pb-16 mx-auto m-3">
            <div class="mt-10 sm:mt-0">

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf
                        @include('checkout.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
