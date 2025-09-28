@php
use Carbon\Carbon;
@endphp
<x-layoutnew.techmin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- 🔍 Form Pencarian --}}
                    <form method="GET" action="{{ route('staff_vac.index') }}" class="mb-3">
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
                                <a href="{{ route('staff_vac.index') }}" class="btn btn-secondary">Reset</a>
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
                                    <th>NIP</th>
                                    <th>NIK</th>
                                    <th>Asal Faskes</th>
                                    <th>Pekerjaan</th>
                                    <th>VAR 1&2</th>
                                    <th>VAR 3</th>
                                    <th>VAR 4</th>
                                    <th>Penanganan</th>
                                    <th>Hapus Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($staff as $case)
                                    <tr>
                                        <td>{{ $staff->firstItem() + $loop->index }}</td>
                                        <td>{{ $case->name }}</td>
                                        <td>{{ $case->nip }}</td>
                                        <td>{{ $case->id_num }}</td>
                                        <td>{{ $case->faskes }}</td>
                                        <td>{{ $case->jobs }}</td>
                                        <td>{{ $case->var_dos12 }}</td>
                                        <td>{{ $case->var_dos3 }}</td>
                                        <td>{{ $case->var_dos4 }}</td>
                                        <td>
                                            <a href="{{ route('staff_vac.edit', $case->id) }}" 
                                               class="btn btn-sm btn-primary">Edit Data</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('staff_vac.destroy', $case->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-muted">
                                            Tidak ada data ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- 🔗 Pagination --}}
                        <div class="mt-3">
                            {{ $staff->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layoutnew.techmin>
