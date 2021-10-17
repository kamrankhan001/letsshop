@extends('interface.layout.layout')
@section("title", "Password Reset")

@section('passwordreset')
    <section class="flex h-screen">
        <div class="m-auto w-96">
            <div class="flex justify-between p-2 bg-gray-700 rounded-t">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="h-6 w-6">
                <h1 class="text-xl">Password Reset</h1>
            </div>
            <div class="w-full bg-yellow-500 hover:bg-yellow-600 h-2"></div>
                <form class="p-2 bg-gray-700" id="" method="POST">
                    @csrf
                    <label for="email" class="block text-gray-200 my-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="flex justify-between">
                        <input type="submit" value="Send" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">
                        <a href="{{route('login')}}" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">Back </a>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection