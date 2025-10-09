<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Editando: {{ $fauna->nome_fauna }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('fauna.update', $fauna) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="return_to" value="{{ $returnTo }}">

                    @method('PUT')

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nome_fauna" class="block mb-2 text-sm font-medium text-gray-900">Nome
                                    Popular</label>
                                <input type="text" name="nome_fauna" id="nome_fauna"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ old('nome_fauna', $fauna->nome_fauna) }}" required>
                                @error('nome_fauna')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="nome_cientifico_fauna"
                                    class="block mb-2 text-sm font-medium text-gray-900">Nome Científico</label>
                                <input type="text" name="nome_cientifico_fauna" id="nome_cientifico_fauna"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ old('nome_cientifico_fauna', $fauna->nome_cientifico_fauna) }}">
                            </div>
                        </div>

                        <div>
                            <label for="familia_fauna"
                                class="block mb-2 text-sm font-medium text-gray-900">Família</label>
                            <input type="text" name="familia_fauna" id="familia_fauna"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                value="{{ old('familia_fauna', $fauna->familia_fauna) }}">
                        </div>

                        <div>
                            <label for="descricao_fauna"
                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                            <textarea name="descricao_fauna" id="descricao_fauna" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('descricao_fauna', $fauna->descricao_fauna) }}</textarea>
                        </div>
                    </div>

                    <!-- Imagem da fauna -->
                    @if ($fauna->imagem_fauna)
                        <div class="mb-4">
                            <p class="block text-sm font-medium text-gray-700">Imagem Atual:</p>
                            <img src="{{ asset('storage/' . $fauna->imagem_fauna) }}"
                                alt="Imagem do {{ $fauna->nome_fauna }}" class="mt-2 h-40 w-auto rounded-md">
                        </div>
                    @endif

                    {{-- Campo para enviar uma NOVA imagem --}}
                    <div>
                        <label for="imagem_fauna" class="block text-sm font-medium text-gray-700">
                            Substituir Imagem (opcional)
                        </label>
                        <input type="file" name="imagem_fauna" id="imagem_fauna"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        @error('imagem_fauna')
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
