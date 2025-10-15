<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Editando Mapa do Bioma: {{ $bioma->nome_bioma }}
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

                <form action="{{ route('biomas.updateMap', $bioma) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="area_geografica" id="area_geografica_input">

                    <div id="map" class="w-full h-[500px] rounded-md border z-10"></div>

                    <div class="mt-6 flex items-center space-x-4">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700">Salvar
                            Mapa</button>
                        <a href="{{ route('biomas.edit', $bioma) }}" class="text-gray-600 hover:underline">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const map = L.map('map').setView([-14.235, -51.925], 4);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        const drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                remove: true
            },
            draw: {
                polygon: true,
                polyline: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            }
        });
        map.addControl(drawControl);

        const areaInput = document.getElementById('area_geografica_input');

        const savedCoords = @json($bioma->area_geografica);
        if (savedCoords) {
            const polygon = L.polygon(savedCoords).addTo(drawnItems);
            map.fitBounds(polygon.getBounds());
            areaInput.value = JSON.stringify(savedCoords);
        }

        map.on(L.Draw.Event.CREATED, function(event) {
            const layer = event.layer;
            drawnItems.clearLayers();
            drawnItems.addLayer(layer);

            const coords = layer.getLatLngs()[0].map(latlng => [latlng.lat, latlng.lng]);
            areaInput.value = JSON.stringify(coords);
        });

        map.on('draw:edited draw:deleted', function(e) {
            const layers = drawnItems.getLayers();
            if (layers.length > 0) {
                const coords = layers[0].getLatLngs()[0].map(latlng => [latlng.lat, latlng.lng]);
                areaInput.value = JSON.stringify(coords);
            } else {
                areaInput.value = '';
            }
        });
    </script>
</x-app-layout>
