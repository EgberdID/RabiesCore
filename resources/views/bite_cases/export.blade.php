<x-layoutnew.techmin>
    <div class="row mb-3">
        <div class="col-12">
            <form method="GET" action="{{ route('bite_cases.export_csv') }}" class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="month" name="bulan" id="bulan" class="form-control" value="{{ request('bulan') }}">
                </div>
                @if(auth()->user()->role === 'superadmin')
                <div class="col-md-3">
                    <label for="district" class="form-label">Kecamatan</label>
                    <select name="district" id="district" class="form-select">
                        <option value="">-- Semua Kecamatan --</option>
                        @foreach($districts as $dist)
                            <option value="{{ $dist->id }}" {{ request('district') == $dist->id ? 'selected' : '' }}>
                                {{ $dist->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="sub_dis" class="form-label">Kelurahan</label>
                    <select name="sub_dis" id="sub_dis" class="form-select">
                        <option value="">-- Semua Kelurahan --</option>
                        @foreach($subDis as $sub)
                            <option value="{{ $sub->id }}" {{ request('sub_dis') == $sub->id ? 'selected' : '' }}>
                                {{ $sub->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="village" class="form-label">Lingkungan</label>
                    <select name="village" id="village" class="form-select">
                        <option value="">-- Semua Lingkungan --</option>
                        @foreach($villages as $village)
                            <option value="{{ $village->id }}" {{ request('village') == $village->id ? 'selected' : '' }}>
                                {{ $village->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-success">Export CSV</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Hasil Export Data Kasus Gigitan</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Umur</th>
                                    <th>Tanggal Kasus</th>
                                    <th>Waktu Kasus</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Lingkungan</th>
                                    <th>Kondisi Hewan</th>
                                    <th>Tanda Gigitan</th>
                                    <th>Kategori Ekspose</th>
                                    <th>User Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $case)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $case->name }}</td>
                                        <td>{{ $case->id_num }}</td>
                                        <td>{{ $case->age }}</td>
                                        <td>{{ $case->case_day ? \Carbon\Carbon::parse($case->case_day)->format('d-m-Y') : '' }}</td>
                                        <td>{{ $case->case_time }}</td>
                                        <td>{{ $case->district?->name }}</td>
                                        <td>{{ $case->subDis?->name }}</td>
                                        <td>{{ $case->village?->name }}</td>
                                        <td>{{ $case->animal_con }}</td>
                                        <td>{{ $case->bite_mark }}</td>
                                        <td>{{ $case->exp_cat }}</td>
                                        <td>{{ $case->user }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <a href="{{ route('bite_cases.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-layoutnew.techmin>
