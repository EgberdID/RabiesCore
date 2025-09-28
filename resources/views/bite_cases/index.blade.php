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
                                <input type="text" 
                                    name="search" 
                                    class="form-control" 
                                    placeholder="Cari nama..." 
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Cari</button>
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
                                         <td>
    @php
        // ambil data langsung sesuai format isi DB
        $animalStat = $case->animal_stat ?? '';
        $animalCon  = $case->animal_con ?? '';
        $biteMarks  = array_map('trim', explode(',', $case->bite_mark ?? ''));
        $biteCoun   = $case->bite_coun === '>1' ? 2 : intval($case->bite_coun ?? 0);
        $woundIde   = $case->wound_ide ?? '';
        $expCat     = $case->exp_cat ?? '';

        // daftar kata kunci sesuai form (huruf besar di awal)
        $dangerMarks = ['Kepala/Leher', 'Jari Tangan/Kaki', 'Genital'];
        $bodyMarks   = ['Lengan', 'Tungkai', 'Badan'];

        $option = 'Cek Data'; // default
        $badge  = 'secondary';

        // 🔴 Option A → Segera suntik
        if (
            in_array($animalStat, ['Liar', 'Tidak Diketahui']) ||
            in_array($animalCon, ['Mati', 'Hilang']) ||
            count(array_intersect($biteMarks, $dangerMarks)) > 0 ||
            ($biteCoun > 1 && str_contains($woundIde, 'Dalam')) ||
            str_contains($expCat, 'Kategori 3')
        ) {
            $option = 'Segera Suntik';
            $badge  = 'danger';
        }
        // 🟢 Option B → Edukasi
        elseif (
            $animalStat === 'Milik Sendiri' &&
            $animalCon === 'Hidup' &&
            count(array_intersect($biteMarks, $bodyMarks)) > 0 &&
            $biteCoun === 1 &&
            str_contains($woundIde, 'Superfisial') &&
            str_contains($expCat, 'Kategori 1')
        ) {
            $option = 'Edukasi';
            $badge  = 'success';
        }
        // 🟡 Option C → Konsultasi Dokter
        elseif (
            $animalStat === 'Milik Sendiri' &&
            $animalCon === 'Hidup' &&
            count(array_intersect($biteMarks, $bodyMarks)) > 0 &&
            $biteCoun > 1 &&
            str_contains($expCat, 'Kategori 2')
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
