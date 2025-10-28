<x-layoutnew.techmin>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Peta Kasus Rabies per Kelurahan</h5>
            <div id="map" style="height: 600px;"></div>
        </div>
    </div>

    {{-- Leaflet CSS & JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data dari controller
        var subdis = @json($subdis);
        var cases = @json($cases);

        // Filter koordinat valid
        var latlngs = subdis
            .map(s => [parseFloat(s.lat), parseFloat(s.lng)])
            .filter(c => !isNaN(c[0]) && !isNaN(c[1]));

        // Inisialisasi map
        var map = L.map('map').setView([0.5218, 124.9111], 12);

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Fungsi menentukan warna berdasarkan jumlah kasus
        function getColor(total) {
            if (total === 0) return 'green';
            if (total <= 3) return 'orange';
            return 'red';
        }

        // Tambahkan marker untuk tiap kelurahan
        latlngs.forEach(function(coord, index) {
            var s = subdis[index];
            var total = cases[s.id] ?? 0;
            var color = getColor(total);

            L.circleMarker(coord, {
                radius: 10,
                color: color,
                fillColor: color,
                fillOpacity: 0.7
            })
            .bindPopup('<strong>' + s.name + '</strong><br>Kasus: ' + total)
            .addTo(map);
        });

        // Zoom otomatis menyesuaikan marker
        if (latlngs.length > 0) {
            map.fitBounds(latlngs);
        }

        // Pastikan ukuran map pas
        setTimeout(() => map.invalidateSize(), 100);

        // Tambahkan legenda warna
        var legend = L.control({ position: 'bottomright' });
        legend.onAdd = function () {
            var div = L.DomUtil.create('div', 'info legend');
            var grades = [
                { label: '0 Kasus', color: 'green' },
                { label: '1–3 Kasus', color: 'orange' },
                { label: '>4 Kasus', color: 'red' }
            ];

            div.innerHTML += '<h4>Keterangan</h4>';
            grades.forEach(g => {
                div.innerHTML +=
                    '<i style="background:' + g.color + '; width:18px; height:18px; float:left; margin-right:8px; opacity:0.7;"></i> ' +
                    g.label + '<br>';
            });
            return div;
        };
        legend.addTo(map);
    });
    </script>
</x-layoutnew.techmin>
