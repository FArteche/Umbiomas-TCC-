<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                Gerenciando Áreas de Preservação de: {{ $bioma->nome_bioma }}
            </h2>
            <a href="{{ route('biomas.edit', $bioma) }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        @if (session('success'))
                            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif
                        <div class="p-6 text-gray-900">
                            <div class="flex justify-between items-center m-2">
                                <h2 class="font-semibold  text-xl text-black leading-tight">Crie ou altere as
                                    áreas de preservação</h2>
                                <a href="{{ route('area_preservacao.create', ['bioma_id' => $bioma->id_bioma]) }}"
                                    class="inline-flex items-center p-3 mb-6 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600">
                                    Adicionar Área de Preservação
                                </a>
                            </div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nome
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tipo
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    {{-- Este loop é a parte essencial --}}
                                    @forelse ($areas as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item->nome_ap }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item->tipoap->nome_tipoap }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <div class="flex items-center justify-end space-x-2 mt-2">

                                                    {{-- Ícone/Link de Editar --}}
                                                    <a href="{{ route('area_preservacao.edit', ['area_preservacao' => $item, 'return_to' => url()->current()]) }}"
                                                        class="text-gray-400 hover:text-blue-600 p-1 rounded-full transition-colors duration-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd"
                                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </a>

                                                    {{-- Formulário/Ícone de Deletar --}}
                                                    <button type="button"
                                                        onclick="confirmDelete('{{ route('area_preservacao.destroy', $item) }}')"
                                                        class="text-gray-400 hover:text-red-600 ...">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2"
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                Nenhuma area cadastrada cadastrado.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form id="delete-form" action="" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                <script>
                    function confirmDelete(deleteUrl) {
                        if (confirm('Tem certeza que deseja deletar este item? Esta ação não pode ser desfeita.')) {
                            let form = document.getElementById('delete-form');
                            form.action = deleteUrl;
                            form.submit();
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
