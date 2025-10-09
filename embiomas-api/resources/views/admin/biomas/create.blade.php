<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Criar Novo Bioma</h2>
            <a href="{{ route('biomas.index') }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('biomas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nome_bioma" class="block text-sm font-medium text-gray-700">Nome do Bioma</label>
                        <input type="text" name="nome_bioma" id="nome_bioma"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="descricao_bioma"
                            class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                        <textarea id="descricao_bioma" name="descricao_bioma" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                        @error('descricao_bioma')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="populacao_bioma" class="block text-sm font-medium text-gray-700">População do
                            Bioma</label>
                        <input type="text" name="populacao_bioma" id="populacao_bioma"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="imagem_bioma" class="block text-sm font-medium text-gray-700">Imagem do
                            Bioma</label>
                        <input type="file" name="imagem_bioma" id="imagem_bioma"
                            class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700
                            hover:file:bg-indigo-100">
                    </div>

                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
