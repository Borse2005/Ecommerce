<x-app-layout>

    <div class="">
        @guest
            @include('welcome')
        @else
            @if (Auth::user()->role_id == 2)
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </x-slot>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
                        <div class="flex flex-wrap">
                            <div class="p-6 max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div style="padding-right: 62px; padding-left: 62px">
                                    <div class="text-xl font-medium text-black text-center text-3xl">{{ count($user) }}
                                    </div>
                                    <p class="text-gray-500">{{ __('Total User') }}</p>
                                </div>
                            </div>
                            <div class="p-6  max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div style="padding-right: 45px; padding-left: 45px">
                                    <div class="text-xl font-medium text-black text-center text-3xl">{{ count($product) }}
                                    </div>
                                    <p class="text-gray-500 ">{{ __('Total Product') }}</p>
                                </div>
                            </div>
                            <div class="p-6 max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div style="padding-right: 45px; padding-left: 45px">
                                    <div class="text-xl font-medium text-black text-center text-3xl">
                                        {{ count($category) }}</div>
                                    <p class="text-gray-500">{{ __('Total category') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mt-10">
                            <div class="p-6 max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div style="padding-right: 62px; padding-left: 62px">
                                    <div class="text-xl font-medium text-black text-center text-3xl">{{ count($session) }}
                                    </div>
                                    <p class="text-gray-500">{{ __('Total Visiotr') }}</p>
                                </div>
                            </div>
                            <div class="p-6 max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div style="padding-right: 50px; padding-left: 50px">
                                    <div class="text-xl font-medium text-black text-center text-3xl">{{ count($order) }}</div>
                                    <p class="text-gray-500">{{ __("Total order") }}</p>
                                </div>
                            </div>
                            <div class="p-6 max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div class="shrink-0">
                                    {{-- <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo"> --}}
                                </div>
                                <div>
                                    <div class="text-xl font-medium text-black text-center text-3xl">55</div>
                                    <p class="text-gray-500">You have a new message!</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mt-10">
                            <div class="p-6 max-w-sm mx-auto bg-white rounded-md shadow-lg flex items-center space-x-4">
                                <div class="shrink-0">
                                    {{-- <img class="h-12 w-12" src="/img/logo.svg" alt="ChitChat Logo"> --}}
                                </div>
                                <div>
                                    <div class="text-xl font-medium text-black text-center text-3xl">55</div>
                                    <p class="text-gray-500">You have a new message!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id == 1)
                @include('welcome')
            @endif
        @endguest
    </div>
</x-app-layout>
