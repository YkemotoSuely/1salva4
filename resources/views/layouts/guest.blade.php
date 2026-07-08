<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">


    <div class="min-h-screen flex">

        <!--Lado Esquerdo-->

        <div class="w-1/2 flex flex-col min-h-screen bg-white p-12">

            <!-- Cabeçalho -->
            <div class="flex items-start gap-4">

                <!-- Barra vermelha -->
                <div class="w-1 h-24 bg-[#A90000] rounded-full"></div>

                <!-- Título -->
                <div>
                    <h1 class="text-4xl font-bold text-[#1F3D55]">
                        HemoPrev
                    </h1>

                    <p class="mt-1 text-lg text-[#A90000]">
                        Plataforma Inteligente para Gestão da Doação de Sangue
                    </p>
                </div>

            </div>

            <!-- Centro da página -->
            <div class="flex-grow flex flex-col justify-center items-center">

                <img src="{{ asset('img/logo-hemoprev.png') }}" class="w-96" alt="Logo">

                <p class="mt-10 text-center text-gray-600 leading-8 max-w-md">
                    Conectando doadores e hemocentros
                    para salvar vidas com inteligência,
                    agilidade e propósito.
                </p>


            </div>

        </div>

        <!-- Lado Direito -->

        <div class="w-1/2 flex justify-center items-center bg-white p-12">

            <div class="w-full max-w-xl">



                <!-- Formulário -->
                {{ $slot }}

            </div>

        </div>

    </div>
</body>

</html>
