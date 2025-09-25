<x-layoutnew.techmin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Cek NIK</h4>

                    <div class="mb-3">
                        <input type="text" id="nik" class="form-control" placeholder="Masukkan NIK">
                    </div>

                    <div id="result-table" class="table-responsive mt-3">
                        @if(!empty($biteCases) && $biteCases->count() > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No Rekam Medis</th>
                                        <th>Umur</th>
                                        <th>Tanggal Kasus</th>
                                        <th>Waktu Kasus</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Lingkungan</th>
                                        <th>Kondisi Hewan</th>
                                        <th>Tanda Gigitan</th>
                                        <th>Kategori Ekspose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($biteCases as $case)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $case->name }}</td>
                                            <td>{{ $case->id_num }}</td>
                                            <td>{{ $case->medrec_no }}</td>
                                            <td>{{ $case->age }}</td>
                                            <td>{{ $case->case_day }}</td>
                                            <td>{{ $case->case_time }}</td>
                                            <td>{{ $case->district?->name }}</td>
                                            <td>{{ $case->subDis?->name }}</td>
                                            <td>{{ $case->village?->name }}</td>
                                            <td>{{ $case->animal_con }}</td>
                                            <td>{{ $case->bite_mark }}</td>
                                            <td>{{ $case->exp_cat }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif(isset($biteCases))
                            <p>Tidak ditemukan data untuk NIK ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
let nikInput = document.getElementById('nik');
let timeout = null;

nikInput.addEventListener('keyup', function () {
    clearTimeout(timeout);
    let nik = this.value.trim();

    timeout = setTimeout(() => {
        if (nik.length > 0) {
            fetch("{{ route('bite_cases.id_check_result') }}?id_num=" + nik)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('result-table').innerHTML = html;
                });
        } else {
            document.getElementById('result-table').innerHTML = '';
        }
    }, 500);
});
</script>
</x-layoutnew.techmin>
