<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                Gerenciando Posts de: {{ $bioma->nome_bioma }}
            </h2>
            <a href="{{ route('post.indexBiomas') }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left ">Título do Post</th>
                                <th class="px-6 py-3 text-left ">Postador</th>
                                <th class="px-6 py-3 text-left ">Data de criação</th>
                                <th class="px-6 py-3 text-center ">Status</th>
                                <th class="px-6 py-3 text-right ">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 ">{{ Str::limit($post->titulo_post, 50) }}</td>
                                    <td class="px-6 py-4 ">{{ $post->postador->nome_postador ?? 'N/A' }}</td>
                                    <td class="px-6 py-4"><strong>{{ $post->created_at->format('d/m/y H:i') }} - {{$post->created_at->diffForHumans()}}</strong> </td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($post->aprovado_post === null)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pendente
                                            </span>
                                        @elseif ($post->aprovado_post === 1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Aprovado
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Reprovado
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('post.show', $post) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Ver Detalhes</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Nenhum post
                                        encontrado para este bioma.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
