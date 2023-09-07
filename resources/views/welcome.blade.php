<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Siempre Bella & Divina</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        <style>
        .owl-carousel .item {
            height: 25rem;
            background: 	#E6D2B0;
            padding: 0.5rem;
        }
        .owl-carousel .item h4 {
            color: #FFF;
            font-weight: 400;
            margin-top: 0rem;
        }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
        <script>
        jQuery(document).ready(function($){
            $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                items:1
                },
                600:{
                items:3
                },
                1000:{
                items:5
                }
            }
            })
        })
        </script>
    </head>
    <body class="antialiased" style="background-color: rgb(255, 203, 239);">
        <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        @if (Route::has('login'))
         <div class="pt-3">
            <div class="text-right z-15">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="color: rgb(66, 64, 64)">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" style="color: rgb(66, 64, 64)">Registrarse</a>
                    @endif
                @endauth
            </div>
         </div>
        @endif
        </div>
        </nav>
        <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto pb-5 pt-1 px-4 sm:px-6 lg:px-8">
                    <a class="font-semibold italic text-xl text-gray-800 leading-tight pb-10">
                        <img src="/img/logo/logo1.png" alt="Logo">
                        SIEMPRE BELLA & DIVINA
                    </a>
                    </div>
                </header>
        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-15 lg:px-16">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="owl-carousel owl-theme mt-10">
                        <div class="item font-semibold"><h3>1</h3>
                            <img class="mt-4" src="/img/home/6.jpg" alt="img1">
                            <center class="mt-2">CORTES DE CABELLO</center>
                        </div>
                        <div class="item font-semibold"><h3>2</h3>
                            <img class="mt-4" src="/img/home/3.jpg" alt="img1">
                            <center class="mt-2">LACIADOS</center>
                        </div>
                        <div class="item font-semibold"><h4>3</h4>
                            <img class="mt-4" src="/img/home/1.jpg" alt="img1">
                            <center class="mt-2">MANICURE</center>
                        </div>
                        <div class="item font-semibold"><h4>4</h4>
                            <img class="mt-4" src="/img/home/2.jpeg" alt="img1">
                            <center class="mt-2">PEDICURE</center>
                        </div>
                        <div class="item font-semibold"><h4>5</h4>
                            <img class="mt-4" src="/img/home/4.jpg" alt="img1">
                            <center class="mt-2">MAQUILLAJES</center>
                        </div>
                        <div class="item font-semibold"><h4>6</h4>
                            <img class="mt-4" src="/img/home/5.jpg" alt="img1">
                            <center class="mt-2">LIFTING DE PESTAÑAS</center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><p></p></div>


    </body>
</html>
