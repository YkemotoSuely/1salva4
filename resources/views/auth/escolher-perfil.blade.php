<x-guest-layout>


    <div class="mb-8">
            <h2 class="text-3xl font-bold text-[#1F3D55]">
                Escolha seu perfil
            </h2>

            <p class="mt-2 text-gray-500">

                Como você deseja utilizar o HemoPrev?
            </p>
        </div>

    <div class="mt-10 space-y-6">

        <a href="{{ route('register.doador') }}"
            class="block p-6 rounded-2xl border border-gray-200 hover:border-[#A90000] hover:shadow-lg transition">

            <h3 class="text-xl font-semibold text-[#1F3D55]">
                ❤️ Sou um Doador
            </h3>

            <p class="mt-2 text-gray-500">
                Quero doar sangue e acompanhar minhas doações.
            </p>

        </a>

        <a href="{{ route('register.hemocentro') }}"
            class="block p-8 rounded-2xl border border-gray-200 hover:border-[#1F3D55] hover:shadow-lg transition">

            <h3 class="text-xl font-semibold text-[#1F3D55]">
                🏥 Represento um Hemocentro
            </h3>

            <p class="mt-2 text-gray-500">
                Quero gerenciar estoques e campanhas de doação.
            </p>

        </a>

    </div>

</x-guest-layout>
