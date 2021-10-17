@extends('interface.layout.layout')
@section("title", "Login")

@section('login')
    <section class="flex h-screen">
        <div class="m-auto w-96">
            @if(session()->has('message'))
                <div class="alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="flex justify-between p-2 bg-gray-700 rounded-t">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="h-6 w-6">
                <h1 class="text-xl">Login</h1>
            </div>
            <div class="w-full bg-yellow-500 hover:bg-yellow-600 h-2"></div>
            <form action="" class="p-2 bg-gray-700" id="login" method="POST">
                @csrf
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
                <div class="flex justify-between">
                    <div>
                        <input type="submit" value="Login" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">
                        <a href="{{route('forgetpassword')}}" class="text-indigo-400 underline block cursor-pointer">Forget Password </a>
                    </div>
                    <div class="my-4">
                        <a href="{{route('register')}}" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">Register </a>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection