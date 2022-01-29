<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    @if (session('order'))
    <div class="mb-6 time">
        <div class=" max-w-sm mx-auto  rounded-lg shadow-lg flex items-center space-x-4 "
            style="background-color: #5bc0de; padding: 10px">
            <div class="mx-auto">
                <div class="text-center font-bold">{{ session('order') }}</div>
            </div>
        </div>
    </div>
@endif
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
                                        Product Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs   font-bolder relative  uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs   font-bolder relative  uppercase tracking-wider">
                                        Customer
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs   font-bolder relative  uppercase tracking-wider">
                                        Order Status
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($order as $orders)
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
                                        <div class="text-sm text-center text-gray-900">{{ $orders->product->product }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <a href="" class="text-indigo-600 hover:text-indigo-900 text-center">{{ $orders->qty }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <a href="" class="text-indigo-600 hover:text-indigo-900 text-center">{{ $orders->address->name }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <form action="{{ route('order.update',$orders->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <select id="status" name="status_id" autocomplete="country-name" class="mt-1 block w-36 mx-auto  py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onchange="this.form.submit()">
                                                <option>Change  Status</option>
                                                @foreach ($status as $value)
                                                    <option value="{{ $value->id }}" {{ old('status_id', optional($orders ?? null)->status_id) == $value->id ? "selected" : ""  }} >{{ $value->status }}</option>
                                                @endforeach
                                              </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium ">
                                        <span class=" py-2 px-4 rounded">
                                            <a href="{{ route('order.show',$orders->id) }}" class="text-indigo-600 hover:text-indigo-900 ">{{ __('Details') }}</a>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-2 text-center font-medium">Order not found</td>
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
