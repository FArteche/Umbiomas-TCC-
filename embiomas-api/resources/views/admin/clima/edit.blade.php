<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Editando: {{ $clima->nome_clima }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('clima.update', $clima) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="return_to" value="{{ $returnTo }}">

                    @method('PUT')

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nome_clima" class="block mb-2 text-sm font-medium text-gray-900">Nome
                                    Popular</label>
                                <input type="text" name="nome_clima" id="nome_clima"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    value="{{ old('nome_clima', $clima->nome_clima) }}" required>
                                @error('nome_clima')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="descricao_clima"
                                    class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                                <textarea name="descricao_clima" id="descricao_clima" rows="4"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('descricao_clima', $clima->descricao_clima) }}</textarea>
                            </div>
                            @if ($clima->imagem_clima)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Imagem Atual</label>
                                    <img src="{{ asset('storage/' . $clima->imagem_clima) }}"
                                        alt="Imagem de {{ $clima->nome_clima }}" class="mt-2 h-40 w-auto rounded-md">
                                </div>
                            @endif
                            <div>
                                <label for="imagem_clima" class="block text-sm font-medium text-gray-700">Substituir
                                    Imagem (Opcional)</label>
                                <input type="file" name="imagem_clima" id="imagem_clima"
                                    class="mt-1 block w-full text-sm ...">
                                @error('imagem_clima')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-8 flex items-center space-x-4 border-t pt-6">
                                <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                                    Salvar Alterações
                                </button>
                                <a href="{{ $returnTo }}" class="text-gray-600 hover:underline">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
