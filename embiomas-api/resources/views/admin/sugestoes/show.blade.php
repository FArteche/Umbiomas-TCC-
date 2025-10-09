<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">Detalhes da Sugestão</h2>
            <a href="{{ route('sugestoes.index') }}"
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-bold border-b pb-2 mb-4">Sugestão Recebida</h3>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $sugestao->texto_sugestao }}</p>
                <p class="text-sm text-gray-500 mt-4">Enviada em: {{ $sugestao->created_at->format('d/m/Y \à\s H:i') }}
                </p>
                <p class="text-sm text-gray-500">Lida em:
                    {{ $sugestao->lido_em ? $sugestao->lido_em->format('d/m/Y \à\s H:i') : 'Ainda não lida' }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-bold border-b pb-2 mb-4">Informações do Autor</h4>
                <p><strong>Nome:</strong> {{ $sugestao->postador->nome_postador ?? 'N/A' }}</p>
                <p><strong>Email:</strong> {{ $sugestao->postador->email_postador ?? 'N/A' }}</p>
                <p><strong>Telefone:</strong> {{ $sugestao->postador->telefone_postador ?? 'N/A' }}</p>
            </div>
            <div class="flex justify-between items-center">
                <form action="{{ route('sugestoes.destroy', $sugestao) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja DELETAR esta sugestão?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700">Deletar
                        Sugestão</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
