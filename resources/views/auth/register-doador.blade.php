<x-guest-layout>

    <div>

        <h2 class="text-3xl font-bold text-[#1F3D55]">
            Cadastro de Doador
        </h2>

        <p class="mt-2 text-gray-500">
            Faça parte da nossa rede de doadores e ajude a salvar vidas.
        </p>

        <form class="mt-8">

            @csrf

            <!-- Dados Pessoais -->

            <h3 class="mt-10 text-lg font-semibold text-[#1F3D55] border-b-2 border-[#A90000] pb-2">
                Dados Pessoais
            </h3>

            <!--Nome -->

            <div class="mt-6">

                <label class="block text-sm font-medium text-gray-700">
                    Nome
                </label>

                <input type="text" name="nome" placeholder="Digite seu nome completo"
                    class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000] focus:ring-[#A90000] transition">


            </div>

            <!-- CPF -->

            <div class="grid grid-cols-2 gap-5 mt-6">

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        CPF
                    </label>

                    <input type="text" name="cpf" placeholder="000.000.000-00"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000] focus:ring-[#A90000] transition">


                </div>


                <div >

                    <label class="block text-sm font-medium text-gray-700">
                        Data de Nascimento
                    </label>

                    <input type="date" name="data_nascimento"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000] focus:ring-[#A90000] transition">


                </div>

            </div>

            <!-- INFORMAÇÕES PARA DOAÇÂO -->

            <h3 class="mt-10 text-lg font-semibold text-[#1F3D55] border-b-2 border-[#A90000] pb-2">
                Informações para Doação
            </h3>

            <div class="grid grid-cols-2 gap-5 mt-6">

                <!-- Tipo Sanguíneo -->
                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        Tipo Sanguíneo
                    </label>

                    <select name="tipo_sanguineo"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000] focus:ring-[#A90000] transition">


                        <option value="">Selecione...</option>

                        <option>A+</option>
                        <option>A-</option>

                        <option>B+</option>
                        <option>B-</option>

                        <option>AB+</option>
                        <option>AB-</option>

                        <option>O+</option>
                        <option>O-</option>

                    </select>

                </div>

                <!-- Cidade -->

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        Cidade
                    </label>

                    <input type="text" name="cidade" placeholder="Informe sua cidade"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000] focus:ring-[#A90000] transition">

                </div>

                <!-- Telefone -->

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        Telefone
                    </label>

                    <input type="text" name="telefone" placeholder="(00) 00000-0000"
                        class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000] focus:ring-[#A90000] transition">

                </div>

            </div>

            <!-- DADOS DE ACESSO -->

            <h3 class="mt-10 text-lg font-semibold text-[#1F3D55] border-b-2 border-[#A90000] pb-2">
                Dados de Acesso
            </h3>

            <!-- E-mail -->

            <div class="mt-6">

                <label class="block text-sm font-medium text-gray-700">
                    E-mail
                </label>

                <input type="email" name="email" placeholder="Digite seu e-mail"
                    class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000]  focus:ring-[#A90000] transition">

            </div>

            <!-- Senha -->

            <div class="mt-6">

                <label class="block text-sm font-medium text-gray-700">
                    Senha
                </label>

                <input type="password" name="password" placeholder="Crie uma senha"
                    class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000]  focus:ring-[#A90000] transition">

            </div>

            <!-- Confirmar senha -->

            <div class="mt-6">

                <label class="block text-sm font-medium text-gray-700">
                    Confirmar senha
                </label>

                <input type="password" name="password_confirmation" placeholder="Confirme sua senha"
                    class="mt-2 w-full rounded-xl border border-gray-300 px-3 py-2 focus:border-[#A90000]  focus:ring-[#A90000] transition">


            </div>

            <div class="mt-10">

                <button type="submit"
                    class="w-full bg-[#A90000] hover:bg-[#8C0000] text-white font-semibold py-2 rounded-xl transition duration-300">

                    Criar minha conta

                </button>

            </div>

            <p class="mt-6 text-center text-sm text-gray-500 italic">

                Cada novo cadastro representa uma nova oportunidade de salvar vidas.

            </p>

            <div class="mt-6 text-center">

                <a href="{{ route('escolher-perfil') }}" class="text-[#1F3D55] hover:text-[#A90000] transition">

                    ← Voltar para escolha do perfil

                </a>

            </div>



        </form>

    </div>

</x-guest-layout>
