<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Editando: {{ $flora->nome_flora }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('flora.update', $flora) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="return_to" value="{{ $returnTo }}">

                    @method('PUT')

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nome_flora" class="block mb-2 text-sm font-medium text-gray-900">Nome
                                    Popular</label>
                                <input type="text" name="nome_flora" id="nome_flora"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ old('nome_flora', $flora->nome_flora) }}" required>
                                @error('nome_flora')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="nome_cientifico_flora"
                                    class="block mb-2 text-sm font-medium text-gray-900">Nome Científico</label>
                                <input type="text" name="nome_cientifico_flora" id="nome_cientifico_flora"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ old('nome_cientifico_flora', $flora->nome_cientifico_flora) }}">
                            </div>
                        </div>

                        <div>
                            <label for="familia_flora"
                                class="block mb-2 text-sm font-medium text-gray-900">Família</label>
                            <input type="text" name="familia_flora" id="familia_flora"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ old('familia_flora', $flora->familia_flora) }}">
                        </div>

                        <div>
                            <label for="descricao_flora"
                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                            <textarea name="descricao_flora" id="descricao_flora" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('descricao_flora', $flora->descricao_flora) }}</textarea>
                        </div>
                    </div>

                    <!-- Imagem da flora -->
                    @if ($flora->imagem_flora)
                        <div class="mb-4">
                            <p class="block text-sm font-medium text-gray-700">Imagem Atual:</p>
                            <img src="{{ asset('storage/' . $flora->imagem_flora) }}"
                                alt="Imagem do {{ $flora->nome_flora }}" class="mt-2 h-40 w-auto rounded-md">
                        </div>
                    @endif

                    {{-- Campo para enviar uma NOVA imagem --}}
                    <div>
                        <label for="imagem_flora" class="block text-sm font-medium text-gray-700">
                            Substituir Imagem (opcional)
                        </label>
                        <input type="file" name="imagem_flora" id="imagem_flora"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        @error('imagem_flora')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-8 flex items-center space-x-4 border-t pt-6">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                            Salvar Alterações
                        </button>
                        <a href="{{ $returnTo }}" class="text-gray-600 hover:underline">
                            Cancelar
                        </a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</x-app-layout>
