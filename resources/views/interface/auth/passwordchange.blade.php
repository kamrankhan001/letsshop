@extends('interface.layout.layout')
@section("title", "Password Change")

@section('passwordchange')
    <section class="flex h-screen">
        <div class="m-auto w-96">
            <div class="flex justify-between p-2 bg-gray-700 rounded-t">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="h-6 w-6">
                <h1 class="text-xl">Password Change</h1>
            </div>
            <div class="w-full bg-yellow-500 hover:bg-yellow-600 h-2"></div>
                <form class="p-2 bg-gray-700" id="" method="POST">
                    @csrf
                    <label for="current_password" class="block text-gray-200 my-2">Old Password</label>
                    <input type="password" name="current_password" id="current_password" placeholder="Old Password" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <label for="password" class="block text-gray-200 my-2">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <label for="password_confirmation" class="block text-gray-200 my-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Password confirm" autocomplete="off" required class="w-full outline-none rounded h-8 p-1 bg-gray-800 focus:bg-gray-900">
                    @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="flex justify-between">
                        <input type="submit" value="Change" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">
                        <a href="{{route('home')}}" class="bg-yellow-500 px-3 py-1 my-3 rounded cursor-pointer hover:bg-yellow-600">Back </a>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection