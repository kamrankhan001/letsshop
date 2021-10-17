@extends('admin.layout.layout')
@section("title","Product Operation")

@section('product operation')

    <div class="rounded-t bg-gray-900">
        <h1 class="text-lg p-2">Product / Product operations</h1>

        <div class="h-6 bg-yellow-300"></div>

        <div class="bg-gray-900 p-3">
            <form action="" method="POST" enctype="multipart/form-data" id="product">
                @csrf

                <div class="flex md:flex-row flex-col justify-between p-2 md:space-y-0 space-y-2">
                    <div class="md:w-1/2 w-full md:ml-2">
                        <label for="product_name" class="block p-1 text-sm">Name</label>
                        <input type="text" name="product_name" id="product_name" placeholder="Name" autocomplete="off" @isset ($product) value="{{$product->name}}" @endisset class="w-full h-9 rounded bg-gray-700 focus:bg-gray-800 p-2 outline-none">
                        @error('product_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="md:w-1/2 w-full md:ml-2">
                        <label for="price" class="block p-1 text-sm">Price</label>
                        <input type="text" name="price" id="price" placeholder="Price" autocomplete="off" @isset ($product) value="{{$product->price}}" @endisset class="w-full h-9 rounded bg-gray-700 focus:bg-gray-800 p-2 outline-none">
                        @error('price')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="flex md:flex-row flex-col justify-between p-2 md:space-y-0 space-y-2">
                    <div class="md:w-1/2 w-full md:ml-2">
                        <label for="Category" class="block p-1 text-sm">Category</label>
                        <select name="category" id="category" class="w-full h-10 rounded bg-gray-700 focus:bg-gray-800 p-2 outline-none">
                            <option value="opetion select" disabled selected>Category</option>
                            <option value="women">Women</option>
                            <option value="men">Men</option>
                            <option value="kids">Kids</option>
                            @isset($product)
                                @if ($product->category == 'women')    
                                <option value="women" selected>Women</option>
                                @endif
                                @if ($product->category == 'men')    
                                <option value="men" selected>Men</option>
                                @endif 
                                @if ($product->category == 'kids')    
                                <option value="kids" selected>Kids</option>
                                @endif                          
                            @endisset
                        </select>
                        @error('category')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="md:w-1/2 w-full md:ml-2">
                        <label for="subcategory" class="block p-1 text-sm">Sub Category</label>
                        <select name="subcategory" id="subcategory" class="w-full h-10 rounded bg-gray-700 focus:bg-gray-800 p-2 outline-none">
                            <option value="">Sub Category</option>
                            @isset($product)
                                <option value="{{$product->sub_category}}" selected>{{$product->sub_category}}</option>                  
                            @endisset
                        </select>
                        @error('subcategory')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="flex md:flex-row flex-col justify-between p-2 md:space-y-0 space-y-2">
                    <div class="md:w-1/2 w-full md:ml-2">
                        <label for="stock" class="block p-1 text-sm">Stock</label>
                        <select name="stock" id="" class="w-full h-10 rounded bg-gray-700 focus:bg-gray-800 p-2 outline-none">
                            <option value="option" selected disabled>Stock</option>
                            <option value="stock out">Stock out</option>
                            <option value="stock in">Stock in</option>
                            @isset($product)
                                @if ($product->is_exist == 'stock out')
                                    <option value="stock out" selected>Stock out</option>
                                @endif
                                @if ($product->is_exist == 'stock in')
                                    <option value="stock in" selected>Stock in</option>
                                @endif
                            @endisset
                        </select>
                        @error('stock')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="md:w-1/2 w-full md:ml-2">
                        <label for="image" class="block p-1 text-sm">Product Image</label>
                        <input type="file" name="image" id="image" class="w-full h-9 rounded bg-gray-700 focus:bg-gray-800 p-2 outline-none">
                        @error('image')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="flex md:flex-row flex-col justify-between p-2 md:space-y-0 space-y-2 mb-2">
                    <div class="md:w-1/2 w-full md:ml-2">
                        <input type="submit" value="Save" class="bg-indigo-600 p-2 hover:bg-indigo-900 rounded text-sm cursor-pointer">
                        <a href="{{route('admin')}}" class="bg-gray-600 p-2 hover:bg-gray-900 rounded text-sm">Back</a>
                    </div>
                </div>
    
            </form>
        </div>

    </div>

@endsection