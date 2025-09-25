<div id="manado-map" style="height: 400px;"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

@push('scripts')
<script>
    var map = L.map('manado-map').setView([-1.4740, 124.8429], 12); // koordinat tengah Manado

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    fetch('{{ asset("geojson/manado.geojson") }}')
        .then(res => res.json())
        .then(geojson => {
            L.geoJson(geojson, {
                style: {
                    fillColor: '#007aff',
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    fillOpacity: 0.6
                },
                onEachFeature: function(feature, layer) {
                    layer.bindPopup(feature.properties.name);
                }
            }).addTo(map);
        });
</script>
@endpush
