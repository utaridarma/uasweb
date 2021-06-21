<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@stack('pagetitle')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- bootsrap --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
            .font-family-karla { font-family: karla; }
            /* .bg-sidebar { background: rgb(196, 76, 243); } */
            .cta-btn { color: #3d68ff; }
            .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; }
            .active-nav-link { background: rgb(0, 174, 255); }
            .nav-item:hover { background: #029aff; }
            .account-link:hover { background: #3d68ff; }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-gray-100 font-family-karla flex">

        @if (Route::has('login'))
            @auth
                @if (Auth::user()->role == 'user')
                    <div class="w-full overflow-x-hidden border-t flex flex-col">
                        <!-- Desktop Header -->
                        <header class="w-full items-center py-2 px-6 hidden sm:flex bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                            <div class="w-1/2"></div>
                            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                                @livewire('navigation-menu')
                            </div>
                        </header>
                        <div class="w-full overflow-x-hidden border-t flex flex-col">
                            <main class="w-full flex-grow p-6">
                                {{ $slot }}
                            </main>
                                                    </div>
                    </div>
                @else
                <aside class="relative bg-blue-400 h-screen w-64 hidden sm:block shadow-xl">
                    {{-- <div class="p-6">
                        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Nintya</a>
                        <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-plus mr-3"></i> New Report
                        </button>
                    </div> --}}
                    <button class="text-white font-bold py-2 px-4">
                    <img src="tbu.jpg" alt="logo" style="width:120px;"> TBU!
                </button>
                    <nav class="text-white text-base font-semibold pt-3">
                        @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role == 'user')
                                <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-home mr-3"></i>
                                    {{ __('Home') }}
                                </a>
                                <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    {{ __('Dashboard') }}
                                </a>
                                <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    {{ __('Order') }}
                                </a>
                            @else
                                <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-home mr-3"></i>
                                    {{ __('Home') }}
                                </a>
                                <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-tachometer-alt mr-3"></i>
                                    {{ __('Dashboard') }}
                                </a>
                                <a href="{{ route('types') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Kategori') }}
                                </a>
                                <a href="{{ route('product') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Product') }}
                                </a>
                                <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Order') }}
                                </a>
                                <a href="{{ route('transactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('Transactions') }}
                                </a>
                                <a href="{{ route('producttransactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                    <i class="fas fa-table mr-3"></i>
                                    {{ __('ProductTransactions') }}
                                </a>
                            @endif
                            @endauth
                        @endif
                    </nav>
                </aside>

                <div class="w-full flex flex-col h-screen overflow-y-hidden">
                    <!-- Desktop Header -->
                    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                        <div class="w-1/2"></div>
                        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                            @livewire('navigation-menu')
                        </div>
                    </header>

                    <!-- Mobile Header & Nav -->
                    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden bg-gradient-to-r from-purple-900 via-purple-400 to-pink-400">
                        <div class="flex items-center justify-between">
                            <a href="index.html" class="text-black text-3xl font-semibold uppercase hover:text-gray-300">Satri4</a>
                            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                                <i x-show="!isOpen" class="fas fa-bars"></i>
                                <i x-show="isOpen" class="fas fa-times"></i>
                            </button>
                        </div>

                        <!-- Dropdown Nav -->
                        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                            @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->role == 'user')
                                    <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-home mr-3"></i>
                                        {{ __('Home') }}
                                    </a>
                                    <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-tachometer-alt mr-3"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-utensils mr-3"></i>
                                        {{ __('Order') }}
                                    </a>
                                @else
                                    <a href="{{ route('home') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-home mr-3"></i>
                                        {{ __('Home') }}
                                    </a>
                                    <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-tachometer-alt mr-3"></i>
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a href="{{ route('cart') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-utensils mr-3"></i>
                                        {{ __('Cart') }}
                                    </a>
                                    <a href="{{ route('types') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Types') }}
                                    </a>
                                    <a href="{{ route('product') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Product') }}
                                    </a>
                                    <a href="{{ route('producttransactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Producttransactions') }}
                                    </a>
                                    <a href="{{ route('transactions') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                                        <i class="fas fa-table mr-3"></i>
                                        {{ __('Transactions') }}
                                    </a>
                                @endif
                                @endauth
                            @endif
                        </nav>
                        <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-plus mr-3"></i> New Report
                        </button> -->
                    </header>

                    <div class="w-full overflow-x-hidden border-t flex flex-col">
                        <main class="w-full flex-grow p-6">
                            {{ $slot }}
                        </main>

                        
                    </div>

                </div>
                @endif
            @endauth
        @endif



        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

        <script>
            var chartOne = document.getElementById('chartOne');
            var myChart = new Chart(chartOne, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            var chartTwo = document.getElementById('chartTwo');
            var myLineChart = new Chart(chartTwo, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        @stack('modals')

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

        @stack('script-custom')

    </body>

    
</html>