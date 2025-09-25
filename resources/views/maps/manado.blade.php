<x-layoutnew.techmin>
    <h2 class="text-xl font-bold mb-4">Peta Kasus Gigitan Manado</h2>
<div id="map" style="height: 600px;"></div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    var map = L.map('map').setView([-1.4740, 124.8429], 12); // koordinat tengah Manado

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var geojsonData = @json(json_decode($geojson));
    var cases = @json($cases);

    function getColor(d) {
        return d > 50 ? '#800026' :
               d > 20 ? '#BD0026' :
               d > 10 ? '#E31A1C' :
               d > 5  ? '#FC4E2A' :
               d > 0  ? '#FD8D3C' :
                        '#FFEDA0';
    }

    function style(feature) {
        var total = cases[feature.properties.subdis_id] || 0;
        return {
            fillColor: getColor(total),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    L.geoJson(geojsonData, {
        style: style,
        onEachFeature: function(feature, layer) {
            var total = cases[feature.properties.subdis_id] || 0;
            layer.bindPopup(feature.properties.name + '<br>Kasus: ' + total);
        }
    }).addTo(map);
</script>
</x-layoutnew.techmin>