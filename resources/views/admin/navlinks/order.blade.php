@extends('admin.layout.layout')
@section("title","Order")

@section('order')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-800 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-700 text-white">
                    <thead class="bg-gray-900">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Sub Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Country</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">City</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Address</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                        @foreach ($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['name']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['category']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['subcategory']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['price']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['quantity']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['total']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['country']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['city']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['address']}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$order['phone']}}</td>
                            <td>
                                <div class="flex justify-around">
                                    @php $id = $order['id']; @endphp
                                    <a href="{{route('delete', $id )}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach    

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection