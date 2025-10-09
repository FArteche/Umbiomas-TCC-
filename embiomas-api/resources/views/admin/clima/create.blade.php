<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Adicionar Novo Animal à Base de Dados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('clima.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="return_to" value="{{ $returnTo }}">

                    <div class="space-y-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nome_clima" class="block mb-2 text-sm font-medium text-gray-900">Nome
                                    </label>
                                <input type="text" name="nome_clima" id="nome_clima"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ old('nome_clima') }}" required>
                                @error('nome_clima')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="descricao_clima"
                                    class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                                <textarea name="descricao_clima" id="descricao_clima" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('descricao_clima') }}</textarea>
                            </div>

                        </div>

                        <div class="mt-8 flex items-center space-x-4 border-t pt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                                Salvar Clima
                            </button>
                            <a href="{{ $returnTo }}" class="text-gray-600 hover:underline">
                                Cancelar e Voltar
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
