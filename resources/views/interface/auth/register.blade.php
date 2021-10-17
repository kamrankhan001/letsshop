@extends('interface.layout.layout')
@section("title", "Register")

@section('register')
    <section class="flex h-screen">
        <div class="m-auto w-96">
            <div class="flex justify-between p-2 bg-gray-700 rounded-t">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="h-6 w-6">
                <h1 class="text-xl">Register</h1>
            </div>
            <div class="w-full bg-yellow-500 hover:bg-yellow-600 h-2"></div>
            <form action="" class="p-2 bg-gray-700" id="register" method="POST">
                @csrf
                <label for="first_name" class="block text-gray-200 my-2">First Name</label>
                <input type="text" name="first_name" id="first_name" placeholder="First Name" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                @error('first_name')
                <div class="error">{{ $message }}</div>
                @enderror
                <label for="last_name" class="block text-gray-200 my-2">Last Name</label>
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                @error('last_name')
                <div class="error">{{ $message }}</div>
                @enderror
                <label for="email" class="block text-gray-200 my-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
                <label for="password" class="block text-gray-200 my-2">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
                <label for="password_confirmation" class="block text-gray-200 my-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                
                <div class="flex justify-between">
                    <input type="submit" value="Register" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">
                    <a href="{{route('login')}}" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">Login </a>
                </div>

            </form>
        </div>
    </section>
@endsection