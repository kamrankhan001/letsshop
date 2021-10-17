@extends('admin/layout.layout')
@section("title","Product")

@section('product')
    <form action="">
        <div class="relative">
            <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"></path>
                    <circle cx="10" cy="10" r="7"></circle>
                    <line x1="21" y1="21" x2="15" y2="15"></line>
                </svg>
            </div>
            <input class="bg-gray-700 focus:outline-none focus:bg-gray-900 rounded text-sm text-gray-300 placeholder-gray-400 pl-10 py-2" type="text" placeholder="Search" />
            <a href="" class="bg-indigo-700 text-sm p-2 rounded hover:bg-indigo-900">Search</a>
            </div>
    </form>

    <div class="flex justify-between items-center mb-2">
        <h4 class="text-lg m-2">Products</h4>
        <a href="{{route('productoperation')}}" class="bg-gray-700 p-2 text-sm rounded hover:bg-gray-900">Add Product</a>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-800 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-700 text-white table-fixed">
                        <thead class="bg-gray-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Category</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Sub Category</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stock</th>
                                <th scope="col" class=" px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-900 divide-y divide-gray-700">
                            @foreach ($products as $product)     
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$product->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$product->category}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$product->sub_category}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$product->price}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button class="bg-blue-600 px-2 rounded text-sm shadow-2xl stock">
                                            {{$product->is_exist}}
                                        </button>
                                    </td>
                                    <td>
                                        <div class="flex justify-around">
                                            <a href="{{route('edit', $product->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <a href="{{route('destroy', $product->id)}}">
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
    
    <div class="my-4">
        {{$products->links()}}
    </div>
@endsection