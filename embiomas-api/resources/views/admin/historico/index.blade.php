<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                Histórico de Alterações do Sistema
            </h2>
            <a href="{{ route('dashboard') }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">

                <form action="{{ route('historico.index') }}" method="GET"
                    class="mb-8 p-4 bg-gray-50 rounded-lg border">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

                        <div>
                            <label for="tipo_alteracao" class="block text-sm font-medium text-gray-700">Tipo de
                                Ação</label>
                            <select name="tipo_alteracao" id="tipo_alteracao"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ...">
                                <option value="">Todos os Tipos</option>
                                <option value="criacao" @selected(request('tipo_alteracao') == 'criacao')>Criação</option>
                                <option value="edicao" @selected(request('tipo_alteracao') == 'edicao')>Edição</option>
                                <option value="exclusao" @selected(request('tipo_alteracao') == 'exclusao')>Exclusão</option>
                            </select>
                        </div>

                        <div>
                            <label for="bioma_id" class="block text-sm font-medium text-gray-700">Filtrar por
                                Bioma</label>
                            <select name="bioma_id" id="bioma_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ...">
                                <option value="">Todos os Biomas</option>
                                @foreach ($biomas as $bioma)
                                    <option value="{{ $bioma->id_bioma }}" @selected(request('bioma_id') == $bioma->id_bioma)>
                                        {{ $bioma->nome_bioma }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="sort" class="block text-sm font-medium text-gray-700">Ordenar Por</label>
                            <select name="sort" id="sort"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm ...">
                                <option value="desc" @selected(request('sort', 'desc') == 'desc')>Mais Recentes</option>
                                <option value="asc" @selected(request('sort') == 'asc')>Mais Antigos</option>
                            </select>
                        </div>

                        <div class="flex items-center space-x-2">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 text-white ...">Filtrar</button>
                            <a href="{{ route('historico.index') }}"
                                class="w-full text-center px-4 py-2 bg-gray-300 text-gray-800 ...">Limpar</a>
                        </div>

                    </div>
                </form>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left ...">Data</th>
                            <th class="px-6 py-3 text-left ...">Usuário</th>
                            <th class="px-6 py-3 text-left ...">Ação</th>
                            <th class="px-6 py-3 text-left ...">Objeto</th>
                            <th class="px-6 py-3 text-left ...">Detalhes</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($historico as $registro)
                            <tr>
                                <td class="px-6 py-4 ...">{{ $registro->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4 ...">{{ $registro->user->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 ...">{{ ucfirst($registro->tipo_alteracao) }}</td>
                                <td class="px-6 py-4 ...">
                                    {{-- Exibe o nome da classe do objeto, ex: "Fauna", "Bioma" --}}
                                    {{ class_basename($registro->loggable_type) }} #{{ $registro->loggable_id }}
                                </td>
                                <td class="px-6 py-4 ...">{{ $registro->detalhes_alteracao }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Nenhum registro
                                    encontrado para os filtros aplicados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{-- O withQueryString() garante que os filtros sejam mantidos ao navegar entre as páginas --}}
                    {{ $historico->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
