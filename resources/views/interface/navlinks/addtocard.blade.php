@extends('interface.layout.layout')
@section("title", "Add To Card")

@section('addtocard')
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
        <img class="object-cover object-center rounded" alt="hero" src="{{asset('product-images/'.$product->image->path)}}">
      </div>

      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-200">{{$product->name}}
          <br class="hidden lg:inline-block">Rs{{$product->price}}
        </h1>
        <form action="" method="POST" id="addtocard">
            @csrf
            <select name="size" id="size" class="sizeerror mb-8 w-44 outline-none bg-gray-700 text-gray-200 focus:bg-gray-800 rounded">
                <option value="options" selected disabled>Select Size</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="xlarge">Extra Large</option>
            </select>
            <div class="flex flex-between lg:flex-row flex-col lg:space-y-0 space-y-4">
                <div class="flex flex-row items-center">
                    <input id="sub" class="bg-yellow-500 hover:bg-yellow-600 cursor-pointer w-10 rounded-l text-2xl text-white" value="-" type="button">
                    <input type="text" name="quantity" id="quantity" readonly placeholder="Quantity" autocomplete="off" value="1" class="h-8 outline-none bg-gray-700 focus:bg-gray-800 text-white px-1">
                    <input id="add" class="bg-yellow-500 hover:bg-yellow-600 cursor-pointer w-10 rounded-r text-2xl text-white" value="+" type="button">
                </div>
                <div>
                    <input value="Add to Card" type="submit" class="bg-yellow-500 hover:bg-yellow-600 cursor-pointer px-4 py-2 lg:ml-3 rounded text-white">
                </div>
            </div>
        </form>
      </div>
    </div>
  </section>
@endsection