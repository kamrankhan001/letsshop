@extends('interface.layout.layout')
@section("title", "Man")

@section('man')

<div class="flex justify-between">

    <aside class="bg-gray-600 w-52">
        <div>
            <ul>
                <li class="hover:bg-gray-700 p-2">
                    <a href="{{route('menjeans')}}" class="">Jeans</a>
                </li>
                <li class="hover:bg-gray-700 p-2">
                    <a href="{{route('polos')}}" class="">Polos</a>
                </li>
                <li class="hover:bg-gray-700 p-2">
                    <a href="{{route('shoe')}}" class="">Shoes</a>
                </li><hr>
            </ul>
        </div>
    </aside>

    <section class="text-gray-400 bg-gray-900 body-font">
        <h1 class="text-3xl container mx-auto text-center pt-2">Men</h1>
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
          
            @foreach ($products as $product) 
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="{{route('addtocard', $product->id)}}" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{asset('product-images/'.$product->image->path)}}">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$product->name}}</h3>
                  <p class="mt-1">Rs{{$product->price}}</p>
                </div>
              </div>
            @endforeach

          </div>
        </div>
        {{$products->links()}}
      </section>

</div>

@endsection