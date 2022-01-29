<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <x-slot name="anchor">
        <h6 class="font-semibold  text-gray-800 leading-tight">
            <a href="{{ route('product.create') }}">{{ __('Add product') }}</a>
        </h6>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto  sm:px-6 lg:px-8">
            <div class="flex flex-col">
                {{-- Error --}}
                @if (session('product'))
                    <div class="mb-6 time">
                        <div class=" max-w-sm mx-auto  rounded-lg shadow-lg flex items-center space-x-4 "
                            style="background-color: #5bc0de; padding: 10px">
                            <div class="mx-auto">
                                <div class="text-center font-bold">{{ session('product') }}</div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-200 mx-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bolder  uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs  font-bolder  uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs   font-bolder relative  uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($product as $products)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-0">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $key++ }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-left text-gray-900">{{ substr($products->product, 0, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                                        <a href="" class="text-indigo-600 hover:text-indigo-900 text-left">{{ $products->category->category }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium ">
                                        <span class=" py-2 px-4 rounded">
                                            <a href="{{ route('product.show',$products->id) }}" class="text-indigo-600 hover:text-indigo-900 ">{{ __('Details') }}</a>
                                        </span>
                                        <a href="{{ route('product.edit',$products->id) }}" class="text-indigo-600 hover:text-indigo-900 px-4">{{ __('Edit') }}</a>
                                        <button type="button" class="text-indigo-600 hover:text-indigo-900 font-600 px-2 font-semibold" value="{{ $products->id }}" id="pro_delete">Delete</button>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="font-bold text-center p-2" colspan="4">Product Not found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
