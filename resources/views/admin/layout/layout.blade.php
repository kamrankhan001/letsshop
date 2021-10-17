<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Let's Shop | Admin | @yield('title')</title>
    @if (session()->has('message'))
        <div class="alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</head>

<body class="bg-gray-800 text-white">


    <div class="flex flex-no-wrap">
        <!-- Computer Nav -->
        <div class="w-52 absolute sm:relative bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
            <div class="px-8">

                <div class="h-16 w-full flex items-center justify-between">
                    <img src="{{asset('images/logo.png')}}" alt="logo" class="h-8 w-8">
                    <h1 class="text-sm">Let's Shop</h1>
                </div>

                <ul class="mt-12">
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="{{route('admin')}}"
                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                </path>
                            </svg>
                            <span class="text-sm ml-2">Products</span>
                        </a>
                    </li>

                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                        <a href="{{route('order')}}"
                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                              </svg>
                            <span class="text-sm ml-2">Orders</span>
                        </a>
                    </li>
                </ul>

            </div>

        </div>

        
        <!-- Mobile Nav -->
        <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
            id="mobile-nav">

            <button aria-label="toggle sidebar" id="openSideBar"
                class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
                onclick="sidebarHandler(true)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="6" cy="10" r="2" />
                    <line x1="6" y1="4" x2="6" y2="8" />
                    <line x1="6" y1="12" x2="6" y2="20" />
                    <circle cx="12" cy="16" r="2" />
                    <line x1="12" y1="4" x2="12" y2="14" />
                    <line x1="12" y1="18" x2="12" y2="20" />
                    <circle cx="18" cy="7" r="2" />
                    <line x1="18" y1="4" x2="18" y2="5" />
                    <line x1="18" y1="9" x2="18" y2="20" />
                </svg>
            </button>

            <button aria-label="Close sidebar" id="closeSideBar"
                class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
                onclick="sidebarHandler(false)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>

            <div class="px-8">

                <div class="h-16 w-full flex items-center justify-between">
                    <img src="{{asset('images/logo.png')}}" alt="logo" class="h-8 w-8">
                    <h1 class="text-sm">Let's Shop</h1>
                </div>

                <ul class="mt-12">
                    
                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)"
                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1">
                                </path>
                            </svg>
                            <span class="text-sm ml-2">Products</span>
                        </a>
                    </li>

                    <li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                        <a href="javascript:void(0)"
                            class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                              </svg>
                            <span class="text-sm ml-2">Orders</span>
                        </a>
                    </li>

                </ul>

            </div>

        </div>


        <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">

            <div class="w-full h-full">

                @yield('product')

                @yield('product operation')

                @yield('order')

            </div>

        </div>
        
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        var sideBar = document.getElementById("mobile-nav");
        var openSidebar = document.getElementById("openSideBar");
        var closeSidebar = document.getElementById("closeSideBar");
        sideBar.style.transform = "translateX(-260px)";

        function sidebarHandler(flag) {
            if (flag) {
                sideBar.style.transform = "translateX(0px)";
                openSidebar.classList.add("hidden");
                closeSidebar.classList.remove("hidden");
            } else {
                sideBar.style.transform = "translateX(-260px)";
                closeSidebar.classList.add("hidden");
                openSidebar.classList.remove("hidden");
            }
        }
    </script>
</body>

</html>
