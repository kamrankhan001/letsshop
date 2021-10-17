<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Let's Shop | @yield('title')</title>
	@if(session()->has('message'))
		<div class="alert-success">
			{{ session()->get('message') }}
		</div>
	@endif
</head>
<body class="bg-gray-800 text-white">
    
	@section('navbar')
		<header>
			<div class="flex justify-between md:container md:mx-auto p-4" id="mob-nav">
				<div class="py-3 lg:hidden">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
					<div class="bg-gray-500 p-2 my-2 text-center rounded w-1/3 absolute z-20 hidden" id="mob-nav-items">
						<ul>
							<li class="my-2 p-2 hover:bg-gray-700 rounded">
								<a href="{{route('home')}}" class="block">Home</a>
							</li>
							<li class="my-2 p-2 hover:bg-gray-700 rounded">
								<a href="{{route('woman')}}" class="block">Women</a>
							</li>
							<li class="my-2 p-2 hover:bg-gray-700 rounded">
								<a href="{{route('man')}}" class="block">Men</a>
							</li>
							<li class="my-2 p-2 hover:bg-gray-700 rounded">
								<a href="{{route('kids')}}" class="block">Kids</a>
							</li>
							@auth
								<li class="my-2 p-2 hover:bg-gray-700 rounded">
									<button class="p-2 rounded-md text-xl hover:bg-gray-700 -sm" id="mob-profile">
										Profile
										<div class="my-2 rounded absolute z-20 hidden text"" id="mob-drop">
											<a href="{{route('passwordchange')}}" class="block">Password Change</a>
											<a href="{{route('logout')}}" class="block">Logout</a>
										</div>
									</button>
								</li>
								<li class="my-2 p-2 hover:bg-gray-700 rounded">
									<a href="{{route('logout')}}" class="block">Logout</a>
								</li>
							@endauth
							@if (!Auth::check())
								<li class="my-2 p-2 hover:bg-gray-700 rounded">
									<a href="{{route('login')}}" class="block">Login</a>
								</li>
								<li class="my-2 p-2 hover:bg-gray-700 rounded">
									<a href="{{route('register')}}" class="block">Register</a>
								</li>
							@endif
							@can('isAdmin', App\Models\Product::class)
								<li class="my-2 p-2 hover:bg-gray-700 rounded>
									<a href="{{route('admin')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Admin Panal</a>
								</li>
							@endcan
						</ul>
					</div>
				</div>

				<nav class="lg:block xs:hidden">
					<a href="{{route('home')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Home</a>
					<a href="{{route('woman')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Women</a>
					<a href="{{route('man')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Men</a>
					<a href="{{route('kids')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Kids</a>

					@auth
						<button href="#" class="p-2 rounded-md text-xl hover:bg-gray-700 -sm" id="profile">
							Profile
							<div class="my-2 rounded absolute z-20 hidden text"" id="drop">
								<ul>
									<li class="my-2 p-2 hover:bg-gray-700 rounded">
										<a href="{{route('passwordchange')}}" class="block">Password Change</a>
									</li>
									<li class="my-2 p-2 hover:bg-gray-700 rounded">
										<a href="{{route('logout')}}" class="block">Logout</a>
									</li>
								</ul>
							</div>
						</button>
					@endauth

					@if (!Auth::check())
						<a href="{{route('login')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Login</a>
						<a href="{{route('register')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Register</a>
					@endif

					@can('isAdmin', App\Models\Product::class)
						<a href="{{route('admin')}}" class="p-2 rounded-md text-xl hover:bg-gray-700">Admin Panal</a>
					@endcan
					
					
				</nav>

				<div class="pt-3">
					<a href="{{route('card')}}" class="inline-flex w-24 items-center">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 inline-block text-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
						</svg>
						<span class="bg-yellow-500 hover:bg-yellow-600 rounded-full h-auto w-7 text-center">{{$items}}</span>
					</a>
				</div>

				<div>
					<a href="{{route('home')}}">
						<img src="{{asset('images/logo.png')}}" alt="logo" class="h-6 inline">
						<span class="text-2xl">Let's Shop</span>
					</a>
				</div>

			</div>
		</header>
	@show
 
	@yield('home')

	@yield('woman')

	@yield('man')

	@yield('tees')

	@yield('polos')

	@yield('desi')

	@yield('casual')

	@yield('jacket')

	@yield('jeans')

	@yield('pant')

	@yield('underwear')

	@yield('loungewear')

	@yield('watches')

	@yield('eyewear')

	@yield('fragrances')

	@yield('shoe')

	@yield('beg')

	@yield('kids')

	@yield('login')

	@yield('register')

	@yield('card')

	@yield('addtocard')

	@yield('passwordchange')

	@yield('passwordreset')

	@yield('passwordresetlink')

	@yield('verifly')


	@section('footer')
	<footer class="text-gray-600 body-font">
		<div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
		  <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
			<img src="{{asset('images/logo.png')}}" alt="logo" class="h-6 w-6">
			<span class="ml-3 text-xl text-white">Let's Shop</span>
		  </a>
		  <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2020 Let's Shop —
			<a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@knyttneve</a>
		  </p>
		  <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
			<a class="text-gray-500">
			  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
				<path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
			  </svg>
			</a>
			<a class="ml-3 text-gray-500">
			  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
				<path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
			  </svg>
			</a>
			<a class="ml-3 text-gray-500">
			  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
				<rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
				<path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
			  </svg>
			</a>
			<a class="ml-3 text-gray-500">
			  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
				<path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
				<circle cx="4" cy="4" r="2" stroke="none"></circle>
			  </svg>
			</a>
		  </span>
		</div>
	  </footer>
	@show

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>