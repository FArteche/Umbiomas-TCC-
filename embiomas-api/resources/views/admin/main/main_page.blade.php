<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                Painel de Administrador UmBiomas
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-green-500 p-6 my-3 rounded-lg shadow-md">
                        <h1 class="text-lg text-center font-medium mb-4">Biomas</h1>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <a href="{{ route('biomas.index') }}"
                                class="px-4 py-2 bg-green-100 text-gray-800 rounded-lg text-center hover:bg-gray-300">Gerenciar
                                Biomas
                            </a>
                            <a href="{{ route('post.indexBiomas') }}"
                                class="px-4 py-2 bg-green-100 text-gray-800 rounded-lg text-center hover:bg-gray-300">Gerenciar
                                Posts
                            </a>
                            <a href="{{ route('historico.index') }}"
                                class="px-4 py-2 bg-green-100 text-gray-800 rounded-lg text-center hover:bg-gray-300">Histórico
                                de
                                Alterações
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="bg-yellow-200 p-6 rounded-lg shadow-md">
                            <h1 class="text-lg font-medium text-center mb-4">Sugestões</h1>
                            <div class="grid">
                                <a href="{{ route('sugestoes.index') }}"
                                    class="px-4 py-2 bg-yellow-100 text-gray-800 rounded-lg text-center hover:bg-gray-300">
                                    Visualizar Sugestões
                                </a>
                            </div>
                        </div>

                        <div class="bg-orange-300 p-6 rounded-lg shadow-md">
                            <h1 class="text-lg font-medium text-center mb-4">Administradores</h1>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <a href="{{ route('profile.edit') }}"
                                    class="px-4 py-2 bg-yellow-100 text-gray-800 rounded-lg text-center hover:bg-gray-300">
                                    Gerenciar Minha Conta
                                </a>
                                <a href="{{ route('users.index') }}"
                                    class="px-4 py-2 bg-yellow-100 text-gray-800 rounded-lg text-center hover:bg-gray-300">
                                    Gerenciar e Criar Contas
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
