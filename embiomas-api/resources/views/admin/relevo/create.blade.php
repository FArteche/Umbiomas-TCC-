<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Adicionar Novo Elemento à Base de Dados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('relevo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bioma_id" value="{{ $bioma_id }}">
                    <div class="space-y-6">

                        <div>
                            <label for="nome_relevo" class="block mb-2 text-sm font-medium text-gray-900">Nome do
                                Relevo</label>
                            <input type="text" name="nome_relevo" id="nome_relevo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ old('nome_relevo') }}" required>
                            @error('nome_relevo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tipo_relevo"
                                class="block mb-2 text-sm font-medium text-gray-900">Tipo do relevo (Opcional)</label>
                            <input type="text" name="tipo_relevo" id="tipo_relevo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ old('tipo_relevo') }}">
                        </div>

                        <div>
                            <label for="descricao_relevo"
                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                            <textarea name="descricao_relevo" id="descricao_relevo" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('descricao_relevo') }}</textarea>
                        </div>

                        <div>
                            <label for="imagem_relevo" class="block text-sm font-medium text-gray-700">Imagem</label>
                            <input type="file" name="imagem_relevo" id="imagem_relevo"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('imagem_relevo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-8 flex items-center space-x-4 border-t pt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                            Salvar Elemento
                        </button>
                        <a href="{{ route('biomas.manageRelevo', ['bioma' => $bioma_id]) }}"
                            class="text-gray-600 hover:underline">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
