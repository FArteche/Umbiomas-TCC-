<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Definindo Localização da Área: {{ $area->nome_ap }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">

                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('areas-preservacao.updateMap', $area) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Este campo oculto guardará as coordenadas do marcador no formato JSON --}}
                    <input type="hidden" name="area_geografica" id="area_geografica_input">

                    <p class="mb-4 text-gray-600">Clique no mapa para adicionar ou mover o marcador que representa a
                        localização da área de preservação.</p>

                    {{-- O container do mapa --}}
                    <div id="map" class="w-full h-[500px] rounded-md border z-10"></div>

                    <div class="mt-6 flex items-center space-x-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">Salvar
                            Localização</button>
                        <a href="{{ route('biomas.manageArea_Preservacao', ['bioma' => $area->bioma_id]) }}"
                            class="text-gray-600 hover:underline">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Inicializa o mapa, centralizado no Brasil
        const map = L.map('map').setView([-14.235, -51.925], 4);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const areaInput = document.getElementById('area_geografica_input');
        let marker = null; // Variável para guardar nosso marcador

        // 1. Pegamos os dados do Blade como antes
        let savedCoords = @json($area->area_geografica);

        // 2. (OPCIONAL, MAS RECOMENDADO) Adicionamos um log para depuração.
        // Pressione F12 no navegador e vá para a aba "Console" para ver o que está sendo impresso.
        console.log("Dados recebidos do banco:", savedCoords);
        console.log("Tipo dos dados:", typeof savedCoords);

        // 3. A MÁGICA: Verificamos se os dados são uma string e, se forem, os convertemos (parse).
        if (typeof savedCoords === 'string' && savedCoords) {
            try {
                savedCoords = JSON.parse(savedCoords);
            } catch (e) {
                console.error("Erro ao converter as coordenadas JSON:", e);
                savedCoords = null; // Anula em caso de erro na conversão
            }
        }
        if (savedCoords && savedCoords.lat && savedCoords.lng) {
            marker = L.marker([savedCoords.lat, savedCoords.lng]).addTo(map);
            map.setView([savedCoords.lat, savedCoords.lng], 13); // Dá zoom na localização
            areaInput.value = JSON.stringify(savedCoords); // Preenche o input
        }

        // Evento disparado QUANDO O USUÁRIO CLICA NO MAPA
        map.on('click', function(e) {
            // Se um marcador já existe, remove-o
            if (marker) {
                map.removeLayer(marker);
            }

            // Cria um novo marcador no local do clique
            marker = L.marker(e.latlng).addTo(map);

            // Pega as coordenadas e atualiza o input oculto
            const coords = {
                lat: e.latlng.lat,
                lng: e.latlng.lng
            };
            areaInput.value = JSON.stringify(coords);
        });
    </script>
</x-app-layout>
