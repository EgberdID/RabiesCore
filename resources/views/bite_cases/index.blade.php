@php
use Carbon\Carbon;
@endphp
<x-layoutnew.techmin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('bite_cases.index') }}" class="mb-3">
    <div class="row g-2 align-items-center">
        <div class="col-auto">
            <select name="status_filter" class="form-select">
                <option value="">-- Filter Status --</option>
                <option value="Tidak Perlu Vaksin" {{ request('status_filter') == 'Tidak Perlu Vaksin' ? 'selected' : '' }}>Tidak Perlu Vaksin</option>
                <option value="Perlu Booster" {{ request('status_filter') == 'Perlu Booster' ? 'selected' : '' }}>Perlu Booster</option>
                <option value="Menunggu Vaksin Dosis 1 & 2" {{ request('status_filter') == 'Menunggu Vaksin Dosis 1 & 2' ? 'selected' : '' }}>Menunggu Vaksin Dosis 1 & 2</option>
                <option value="Menunggu Vaksin Dosis 3" {{ request('status_filter') == 'Menunggu Vaksin Dosis 3' ? 'selected' : '' }}>Menunggu Vaksin Dosis 3</option>
                <option value="Menunggu Vaksin Dosis 4" {{ request('status_filter') == 'Menunggu Vaksin Dosis 4' ? 'selected' : '' }}>Menunggu Vaksin Dosis 4</option>
                <option value="Observasi Pasca Gigitan" {{ request('status_filter') == 'Observasi Pasca Gigitan' ? 'selected' : '' }}>Observasi Pasca Gigitan</option>
                <option value="Observasi Pasca Vaksin" {{ request('status_filter') == 'Observasi Pasca Vaksin' ? 'selected' : '' }}>Observasi Pasca Vaksin</option>
                <option value="Konsultasi Dokter" {{ request('status_filter') == 'Konsultasi Dokter' ? 'selected' : '' }}>Konsultasi Dokter</option>
                <option value="Edukasi" {{ request('status_filter') == 'Edukasi' ? 'selected' : '' }}>Edukasi</option>
                <option value="Sudah Selesai" {{ request('status_filter') == 'Sudah Selesai' ? 'selected' : '' }}>Sudah Selesai</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
        <div class="col-auto">
            <a href="{{ route('bite_cases.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

                    <h4 class="card-title mb-4">Data Kasus Gigitan</h4>

                    <div class="table-responsive">
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
                                    <th>Status Pasien</th>
                                    <th>Status Penanganan</th>
                                    <th>Saran Tindakan</th>
                                    <th>Penanganan</th>
                                    <th>Hapus Data</th>
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
                                        <td>
                                            {{-- Badge umur --}}
                                            @if($case->age <= 12)
                                                <span class="badge bg-danger">Umur ≤ 12</span>
                                            @else
                                                <span class="badge bg-success">Umur OK</span>
                                            @endif

                                            {{-- Badge kondisi hewan --}}
                                            @if(in_array($case->animal_con, ['Mati', 'Hilang']))
                                                <span class="badge bg-danger">Hewan {{ $case->animal_con }}</span>
                                            @else
                                                <span class="badge bg-success">Hewan Hidup</span>
                                            @endif

                                            {{-- Badge lokasi luka --}}
                                            @php
                                                $dangerZones = ['Kepala/Leher','Jari Tangan/Kaki'];
                                                $injuries = array_map('trim', explode(',', $case->bite_mark ?? ''));
                                                $injuryDanger = count(array_intersect($injuries, $dangerZones)) > 0;
                                            @endphp

                                            @if($injuryDanger)
                                                <span class="badge bg-danger">Luka Berbahaya</span>
                                            @else
                                                <span class="badge bg-success">Luka Aman</span>
                                            @endif

                                        </td>

                                        {{-- <td>
                                            @php
                                                $badgeVarDos4 = '<span class="badge bg-danger">Belum Ada Dosis 4</span>';
                                                $badgeYva     = '<span class="badge bg-danger">Belum Ada Riwayat Vaksin</span>';

                                                $today = Carbon::now();

                                                // Dosis 4
                                                if ($case->var_dos4) {
                                                    $varDos4Date = Carbon::parse($case->var_dos4);
                                                    $diffVarDos4 = $varDos4Date->diff($today); // CarbonInterval
                                                    $years = $diffVarDos4->y;
                                                    $months = $diffVarDos4->m;

                                                    $badgeVarDos4 = $years < 1
                                                        ? '<span class="badge bg-success">Dosis4 < 1 Tahun</span>'
                                                        : '<span class="badge bg-warning">Dosis4 > 1 Tahun (' . $years . ' thn ' . $months . ' bln)</span>';
                                                }

                                                // Vaksin terakhir (y_va)
                                                if ($case->y_va) {
                                                    $yvaDate = Carbon::parse($case->y_va);
                                                    $diffYva = $yvaDate->diff($today);
                                                    $yearsYva = $diffYva->y;
                                                    $monthsYva = $diffYva->m;

                                                    $badgeYva = $yearsYva < 1
                                                        ? '<span class="badge bg-success">Vaksin < 1 Tahun</span>'
                                                        : '<span class="badge bg-warning">Vaksin > 1 Tahun (' . $yearsYva . ' thn ' . $monthsYva . ' bln)</span>';
                                                }
                                            @endphp

                                            {!! $badgeVarDos4 !!}
                                            {!! $badgeYva !!}
                                        </td> --}}
                                        <td>{{ $case->status }}</td>

                                        <td>
                                            @php
                                                // normalisasi data
                                                $animalStat = strtolower($case->animal_stat ?? '');
                                                $animalCon  = strtolower($case->animal_con ?? '');
                                                $biteMarks  = array_map('trim', explode(',', strtolower($case->bite_mark ?? '')));
                                                $biteCoun   = intval($case->bite_coun ?? 0);
                                                $woundIde   = strtolower($case->wound_ide ?? '');
                                                $expCat     = strtolower($case->exp_cat ?? '');

                                                $dangerMarks = ['kepala/leher', 'jari tangan/kaki', 'genital'];
                                                $bodyMarks   = ['lengan', 'tungkai', 'badan'];

                                                $option = 'Cek Data'; // default
                                                $badge  = 'secondary';

                                                // 🔴 Option A → Segera suntik
                                                if (
                                                    in_array($animalStat, ['liar', 'tidak diketahui']) ||
                                                    in_array($animalCon, ['mati', 'hilang']) ||
                                                    count(array_intersect($biteMarks, $dangerMarks)) > 0 ||
                                                    ($biteCoun > 1 && str_contains($woundIde, 'dalam')) ||
                                                    str_contains($expCat, 'kategori 3')
                                                ) {
                                                    $option = 'Segera Suntik ';
                                                    $badge  = 'danger';
                                                }
                                                // 🟢 Option B → Edukasi
                                                elseif (
                                                    $animalStat === 'milik sendiri' &&
                                                    $animalCon === 'hidup' &&
                                                    count(array_intersect($biteMarks, $bodyMarks)) > 0 &&
                                                    $biteCoun === 1 &&
                                                    str_contains($woundIde, 'superfisial') &&
                                                    str_contains($expCat, 'kategori 1')
                                                ) {
                                                    $option = 'Edukasi';
                                                    $badge  = 'success';
                                                }
                                                // 🟡 Option C → Konsultasi Dokter
                                                elseif (
                                                    $animalStat === 'milik sendiri' &&
                                                    $animalCon === 'hidup' &&
                                                    count(array_intersect($biteMarks, $bodyMarks)) > 0 &&
                                                    $biteCoun > 1 &&
                                                    str_contains($woundIde, 'dalam') &&
                                                    str_contains($expCat, 'kategori 2')
                                                ) {
                                                    $option = 'Konsultasi Dokter';
                                                    $badge  = 'warning';
                                                }
                                            @endphp

                                            <span class="badge bg-{{ $badge }}">{{ $option }}</span>
                                        </td>




                                        <td>  {{-- tombol aksi tambahan --}}
                                            <a href="{{ route('bite_cases.edit', $case->id) }}" class="btn btn-sm btn-primary">Edit Data</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('bite_cases.destroy', $case->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kasus ini?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="col-xl-6">
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                        {{ $biteCases->links('pagination::bootstrap-5') }}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layoutnew.techmin>
