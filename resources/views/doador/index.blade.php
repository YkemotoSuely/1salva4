<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel do Doador</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<!-- Conteúdo principal -->

<main class="max-w-7xl mx-auto p-8">

    <div class="bg-white rounded-2xl shadow-md p-8">

        <h2 class="text-3xl font-bold text-[#1F3D55]">
            Olá, Suely! 👋
        </h2>

        <p class="mt-2 text-gray-600">
            Que bom ter você conosco.
        </p>

        <p class="text-gray-600">
            Sua próxima doação pode salvar muitas vidas.
        </p>

    </div>

</main>

<p class="text-gray-600">
    Sua próxima doação pode salvar muitas vidas.</p>

<div class="grid grid-cols-2 gap-6 mt-8">

    <div class="bg-gray-50 p-6 rounded-xl">

        <p class="text-sm text-gray-500">
            🩸 Tipo sanguíneo
        </p>

        <p class="mt-2 text-2xl font-bold text-[#1F3D55]">
            O+
        </p>

    </div>

    <div class="bg-gray-50 p-6 rounded-xl">

        <p class="text-sm text-gray-500">
            📅 Próxima doação
        </p>

        <p class="mt-2 text-2xl font-bold text-[#1F3D55]">
            20/08/2026
        </p>

    </div>

    <div class="bg-gray-50 p-6 rounded-xl">

        <p class="text-sm text-gray-500">
            📍 Cidade
        </p>

        <p class="mt-2 text-2xl font-bold text-[#1F3D55]">
            Marília
        </p>

    </div>

    <div class="bg-gray-50 p-6 rounded-xl">

        <p class="text-sm text-gray-500">
            🏆 Total de doações
        </p>

        <p class="mt-2 text-2xl font-bold text-[#1F3D55]">
            12
        </p>

    </div>

</div>

<body class="bg-gray-100">

    <!-- Cabeçalho -->

    <header class="bg-white shadow-md">

        <div class="max-w-7xl mx-auto px-8 py-6 flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-[#1F3D55]">
                    1 Salva 4
                </h1>

                <p class="text-[#A90000]">
                    Plataforma HemoPrev
                </p>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="px-5 py-2 rounded-lg bg-[#A90000] text-white">

                    Sair

                </button>

            </form>

        </div>

    </header>

</body>

</html>
