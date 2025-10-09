<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Editando Bioma: {{ $bioma->nome_bioma }}</h2>
            <a href="{{ route('biomas.index') }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-medium mb-4">Informações Principais</h3>

                <form action="{{ route('biomas.update', $bioma) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6">
                        <!-- Nome do Bioma -->
                        <div>
                            <label for="nome_bioma" class="block mb-2 text-sm font-medium text-gray-900">Nome do
                                Bioma</label>
                            <input type="text" id="nome_bioma" name="nome_bioma"
                                value="{{ old('nome_bioma', $bioma->nome_bioma) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('nome_bioma')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descrição do Bioma -->
                        <div>
                            <label for="descricao_bioma"
                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                            <textarea id="descricao_bioma" name="descricao_bioma" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('descricao_bioma', $bioma->descricao_bioma) }}</textarea>
                            @error('descricao_bioma')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- População do Bioma -->
                        <div>
                            <label for="populacao_bioma"
                                class="block mb-2 text-sm font-medium text-gray-900">População</label>
                            <input type="number" id="populacao_bioma" name="populacao_bioma"
                                value="{{ old('populacao_bioma', $bioma->populacao_bioma) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('populacao_bioma')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Imagem do Bioma -->
                        @if ($bioma->imagem_bioma)
                            <div class="mb-4">
                                <p class="block text-sm font-medium text-gray-700">Imagem Atual:</p>
                                <img src="{{ asset('storage/' . $bioma->imagem_bioma) }}"
                                    alt="Imagem do {{ $bioma->nome_bioma }}" class="mt-2 h-40 w-auto rounded-md">
                            </div>
                        @endif

                        {{-- Campo para enviar uma NOVA imagem --}}
                        <div>
                            <label for="imagem_bioma" class="block text-sm font-medium text-gray-700">
                                Substituir Imagem (opcional)
                            </label>
                            <input type="file" name="imagem_bioma" id="imagem_bioma"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('imagem_bioma')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                        Atualizar Informações
                    </button>
                </form>
                <div class="bg-blue-300 p-6 my-3 rounded-lg shadow-md">
                    <h1 class="text-lg font-medium mb-4">Gerenciar Atributos</h1>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <a href="{{ route('biomas.manageFauna', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Fauna</a>
                        <a href="{{ route('biomas.manageFlora', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Flora</a>
                        <a href="{{ route('biomas.manageClima', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Clima</a>
                        <a href="{{ route('biomas.manageCaracteristicas', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Características</a>
                        <a href="{{ route('biomas.manageArea_Preservacao', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Áreas de
                            Preservação</a>
                        <a href="{{ route('biomas.manageRelevo', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Relevo</a>
                        <a href="{{ route('biomas.manageHidrografia', $bioma) }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">Hidrografia</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
