<x-layoutnew.techmin>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Jumlah Kasus per Kelurahan</h5>

        {{-- Filter Admin --}}
        <div class="mb-3">
            <label for="user-filter" class="form-label">Filter berdasarkan Admin Input:</label>
            <select id="user-filter" class="form-select" style="width:250px">
                <option value="">-- Semua Admin --</option>
                @foreach ($admins as $admin)
                    <option value="{{ $admin }}">{{ $admin }}</option>
                @endforeach
            </select>
        </div>

        {{-- Chart --}}
        <div id="subdis-chart" style="height: 400px;"></div>
    </div>
</div>

<a href="{{ route('bite_cases.send_alert') }}" class="btn btn-warning mb-3">Kirim Email Peringatan</a>

{{-- ApexCharts --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var options = {
        chart: { type: 'bar', height: 400 },
        series: [{ name: 'Jumlah Kasus', data: @json($data) }],
        xaxis: { categories: @json($labels) },
        dataLabels: { enabled: true }
    };
    var chart = new ApexCharts(document.querySelector("#subdis-chart"), options);
    chart.render();

    // Saat filter berubah
    document.getElementById('user-filter').addEventListener('change', function() {
        const user = this.value;
        fetch(`{{ route('bite_cases.chart_subdis') }}?user=${user}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(response => {
            chart.updateOptions({ xaxis: { categories: response.labels } });
            chart.updateSeries([{ name: 'Jumlah Kasus', data: response.data }]);
        });
    });
});
</script>
</x-layoutnew.techmin>
