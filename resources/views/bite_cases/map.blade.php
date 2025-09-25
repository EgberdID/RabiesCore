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
            // Inisialisasi map di pusat Manado
            var map = L.map('map').setView([-1.5, 124.83], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Data dari controller
            var subdis = @json($subdis);
            var cases = @json($cases);

            // Pastikan lat/lng bertipe number
            subdis.forEach(function(s) {
                var lat = parseFloat(s.lat);
                var lng = parseFloat(s.lng);
                var total = cases[s.id] ?? 0;

                // Cek validitas koordinat
                if (!isNaN(lat) && !isNaN(lng)) {
                    L.marker([lat, lng])
                     .bindPopup('<strong>' + s.name + '</strong><br>Kasus: ' + total)
                     .addTo(map);
                } else {
                    console.warn('Koordinat invalid:', s);
                }
            });
        });
    </script>
</x-layoutnew.techmin>
