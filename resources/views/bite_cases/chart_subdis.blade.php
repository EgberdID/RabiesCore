<x-layoutnew.techmin>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jumlah Kasus per Sub District</h5>

            {{-- Debug --}}
            {{-- <pre>
Labels: {{ $labels }}
Data: {{ $data }}
            </pre> --}}

            {{-- Chart --}}
            <div id="subdis-chart" style="height: 400px;"></div>
        </div>
    </div>

    {{-- Script ApexCharts --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            chart: { type: 'bar', height: 400 },
            series: [{
                name: 'Jumlah Kasus',
                data: @json($data)
            }],
            xaxis: {
                categories: @json($labels)
            },
            dataLabels: { enabled: true }
        };

        var chart = new ApexCharts(document.querySelector("#subdis-chart"), options);
        chart.render();
    });
    </script>
    <a href="{{ route('bite_cases.send_alert') }}" class="btn btn-warning mb-3">
    Kirim Email Peringatan
</a>
</x-layoutnew.techmin>
