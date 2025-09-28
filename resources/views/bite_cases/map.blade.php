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

        // Inisialisasi map fallback
        var map = L.map('map').setView([0.5218, 124.9111], 12);

        // Tile layer OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker
        latlngs.forEach(function(coord, index) {
            var s = subdis[index];
            var total = cases[s.id] ?? 0;

            L.marker(coord)
             .bindPopup('<strong>' + s.name + '</strong><br>Kasus: ' + total)
             .addTo(map);
        });

        // Jika ada marker, zoom & center otomatis
        if (latlngs.length > 0) {
            map.fitBounds(latlngs);
        }

        // Pastikan ukuran map ter-update agar tidak muncul di laut
        setTimeout(function() {
            map.invalidateSize();
        }, 100);
    });
    </script>
</x-layoutnew.techmin>
