<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Criar Nova Area de Preservação
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Inicia o Alpine.js, isModalOpen controla a visibilidade do popup --}}
            <div x-data="areapreservacaoFormComponent()" class="bg-white p-6 rounded-lg shadow-md">
                <form action="{{ route('area_preservacao.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="bioma_id" value="{{ $bioma_id }}">
                    <div class="space-y-6">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="tipoap_id" class="block text-sm font-medium text-gray-900">Tipo de Área de
                                    Prevervação</label>
                                {{-- BOTÃO PARA ABRIR O POPUP --}}
                                <button type="button" @click.prevent="isModalOpen = true"
                                    class="text-sm text-indigo-600 hover:text-indigo-900 font-semibold">
                                    + Adicionar Novo
                                </button>
                            </div>
                            <select name="tipoap_id" id="tipoap_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                required>
                                <option value="" disabled selected>-- Selecione um tipo --</option>
                                {{-- Loop para popular as opções do dropdown com os dados do controller --}}
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id_tipoap }}"
                                        {{ old('tipoap_id') == $tipo->id_tipoap ? 'selected' : '' }}>
                                        {{ $tipo->nome_tipoap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tipoap_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nome_ap" class="block mb-2 text-sm font-medium text-gray-900">Nome da
                                Área de preservacao</label>
                            <input type="text" name="nome_ap" id="nome_ap"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                value="{{ old('nome_ap') }}" required>
                            @error('nome_ap')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="descricao_ap"
                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                            <textarea name="descricao_ap" id="descricao_ap" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">{{ old('descricao_ap') }}</textarea>
                            @error('descricao_ap')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="imagem_ap" class="block text-sm font-medium text-gray-700">Imagem da Área
                                (Opcional)</label>
                            <input type="file" name="imagem_ap" id="imagem_ap" class="mt-1 block w-full ...">
                            @error('imagem_ap')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex items-center space-x-4 border-t pt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">
                            Salvar Área
                        </button>
                        {{-- Este link de cancelar usa o $bioma_id para voltar para a tela de gerenciamento correta --}}
                        <a href="{{ route('biomas.manageArea_Preservacao', ['bioma' => $bioma_id]) }}"
                            class="text-gray-600 hover:underline">
                            Cancelar
                        </a>
                    </div>
                </form>

                <div x-show="isModalOpen" @keydown.escape.window="isModalOpen = false"
                    class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center"
                    x-cloak>
                    <div @click.away="isModalOpen = false"
                        class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Adicionar Novo Tipo</h3>
                            <div class="mt-2 px-7 py-3">
                                <input type="text" x-model="newTipoName" placeholder="Nome do novo tipo"
                                    class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none">
                            </div>
                            <div class="items-center px-4 py-3">
                                <button @click.prevent="addNewTipo()"
                                    class="px-4 py-2 bg-indigo-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-300">
                                    Salvar Novo Tipo
                                </button>
                                <button @click.prevent="isModalOpen = false"
                                    class="mt-2 px-4 py-2 bg-gray-200 text-gray-800 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-300 focus:outline-none">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function areapreservacaoFormComponent() {
            return {
                isModalOpen: false,
                newTipoName: '',

                // A função agora vive dentro do escopo do Alpine, usando 'this'
                addNewTipo() {
                    let newName = this.newTipoName;
                    if (!newName.trim()) {
                        alert('Por favor, insira um nome para o tipo.');
                        return;
                    }

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('{{ route('tipo-ap.storeAjax') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                nome_tipoap: newName
                            }),
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => Promise.reject(data));
                            }
                            return response.json();
                        })
                        .then(newTipo => {
                            const select = document.getElementById('tipoap_id');
                            const option = new Option(newTipo.nome_tipoap, newTipo.id_tipoap);
                            select.add(option);
                            select.value = newTipo.id_tipoap;

                            this.newTipoName = ''; // Usa 'this' para acessar as propriedades
                            this.isModalOpen = false; // Usa 'this' para acessar as propriedades

                            alert('Tipo "' + newTipo.nome_tipoap + '" adicionado com sucesso!');
                        })
                        .catch(errorData => {
                            console.error('Error:', errorData);
                            alert('Erro ao adicionar tipo: ' + (errorData.error ||
                                'Erro desconhecido. Verifique o console.'));
                        });
                }
            }
        }
    </script>

</x-app-layout>
