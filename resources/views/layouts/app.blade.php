<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #fff;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            color:#000;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-bottom: 1px solid rgb(0,0,0, 0.1);
        }
        .sidebar a:hover {
            background: #495057;
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .actions{
            text-decoration: none;
            border-radius: 25px;
            padding: 5px;
            margin-inline:5px;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <div id="app">
         <!-- Navbar -->
         <nav class="bg-white shadow-md z-10 sticky top-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <a class="text-lg font-semibold text-gray-800 pt-2" href="{{ url('/') }}">
                            <svg width="50" height="50" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Background Circle -->
                                <circle cx="100" cy="100" r="90" fill="#2C3E50" stroke="#3498DB" stroke-width="10"/>

                                <!-- Document Shape -->
                                <rect x="60" y="50" width="80" height="100" rx="10" fill="white"/>

                                <!-- Checkmark -->
                                <path d="M75 100 L90 120 L125 80" stroke="#2ECC71" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                                <!-- Horizontal Lines inside Document -->
                                <line x1="70" y1="70" x2="130" y2="70" stroke="#BDC3C7" stroke-width="4"/>
                                <line x1="70" y1="85" x2="130" y2="85" stroke="#BDC3C7" stroke-width="4"/>
                                <line x1="70" y1="125" x2="130" y2="125" stroke="#BDC3C7" stroke-width="4"/>
                            </svg>
                        </a>
                        <a class="text-lg font-semibold text-gray-950 pt-3 ml-1" href="{{ url('/') }}">
                            Tasks Management System
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900">Register</a>
                            @endif
                        @else
                            <div class="relative">
                                <button class="text-gray-950 font-bold hover:text-gray-900 focus:outline-none bg-gray-400 rounded-md px-4">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
            <!-- Main Content -->
            <div class="flex-1 ml-64 p-6">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
