<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                Detalhes do Post: {{ Str::limit($post->titulo_post, 40) }}
            </h2>
            <a href="{{ route('biomas.managePost', $post->bioma_id) }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div class="max-w-6xl mx-auto mb-6 sm:px-6 lg:px-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-2xl font-bold mb-2">{{ $post->titulo_post }}</h3>
                @if ($post->midia_post)
                    <img src="{{ asset('storage/' . $post->midia_post) }}" alt="Mídia do post"
                        class="w-full h-auto rounded-md mb-4">
                @endif
                <div class="prose max-w-none">
                    {!! nl2br(e($post->texto_post)) !!}
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-bold border-b pb-2 mb-4">Informações do Postador</h4>
                    <p><strong>Nome:</strong> {{ $post->postador->nome_postador ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $post->postador->email_postador ?? 'N/A' }}</p>
                    <p><strong>Telefone:</strong> {{ $post->postador->telefone_postador ?? 'N/A' }}</p>
                    <p><strong>Instituição:</strong> {{ $post->postador->instituicao_postador ?? 'N/A' }}</p>
                    <p><strong>Criado em:</strong> {{ $post->created_at->format('d/m/y H:i')}}</p>
                    <p class="px-6 py-4 text-center">
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
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h4 class="text-lg font-bold border-b pb-2 mb-4">Moderação</h4>
                    <div class="flex flex-col space-y-3">
                        <form action="{{ route('post.approve', $post) }}" method="POST">
                            @csrf @method('PUT')
                            <button type="submit"
                                class="w-full text-center px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">Aprovar
                                Post</button>
                        </form>
                        <form action="{{ route('post.reject', $post) }}" method="POST">
                            @csrf @method('PUT')
                            <button type="submit"
                                class="w-full text-center px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600">Reprovar
                                Post</button>
                        </form>
                        <form action="{{ route('post.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja DELETAR este post?');">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="w-full text-center px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700">Deletar
                                Post</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
