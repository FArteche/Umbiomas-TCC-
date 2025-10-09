<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Adicionar Novo Elemento à Base de Dados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('hidrografia.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bioma_id" value="{{ $bioma_id }}">
                    <div class="space-y-6">

                        <div>
                            <label for="nome_hidrografia" class="block mb-2 text-sm font-medium text-gray-900">Nome da
                                hidrografia</label>
                            <input type="text" name="nome_hidrografia" id="nome_hidrografia"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ old('nome_hidrografia') }}" required>
                            @error('nome_hidrografia')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tipo_hidrografia"
                                class="block mb-2 text-sm font-medium text-gray-900">Tipo de hidrografia (Opcional)</label>
                            <input type="text" name="tipo_hidrografia" id="tipo_hidrografia"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ old('tipo_hidrografia') }}">
                        </div>

                        <div>
                            <label for="descricao_hidrografia"
                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                            <textarea name="descricao_hidrografia" id="descricao_hidrografia" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('descricao_hidrografia') }}</textarea>
                        </div>

                        <div>
                            <label for="imagem_hidrografia" class="block text-sm font-medium text-gray-700">Imagem</label>
                            <input type="file" name="imagem_hidrografia" id="imagem_hidrografia"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('imagem_hidrografia')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-8 flex items-center space-x-4 border-t pt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                            Salvar Elemento
                        </button>
                        <a href="{{ route('biomas.manageHidrografia', ['bioma' => $bioma_id]) }}"
                            class="text-gray-600 hover:underline">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
