<x-layoutnew.techmin>
    <div class="container-fluid">
        <form action="{{ route('staff_vac.update', ['staff_vac' => $staff->id]) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- Identitas Pasien --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">A. Identitas Pasien</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="user" value="{{ auth()->user()->name }}">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama lengkap</label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $staff->name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nip1" class="form-label">Nomor Induk Pegawai</label>
                                        <input type="text" id="nip1" name="nip" class="form-control" value="{{ old('nip', $staff->nip) }}">
                                        <small id="nip-feedback" class="text-danger d-none">NIP sudah terdaftar!</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                        <input type="text" id="nik" name="id_num" class="form-control" value="{{ old('id_num', $staff->id_num) }}">
                                        <small id="nik-feedback" class="text-danger d-none">NIK sudah terdaftar!</small>
                                    </div>                                   

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="example-textarea" rows="5" name="address">{{ old('address', $staff->address) }}</textarea>
                                    </div>                               
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                     <div class="mb-3">
                                        <label for="fas" class="form-label">Fasilitas Kesehatan Asal</label>
                                        <input class="form-control" id="fas" type="text" name="faskes" value="{{ old('faskes', $staff->faskes) }}">
                                    </div>

                                    <div class="mb-3">
    <label for="job" class="form-label">Pekerjaan</label>
    <select class="form-select" id="job" name="jobs">
        <option value="">-- Pilih Pekerjaan --</option>
        @foreach($jobs as $job)
            <option value="{{ $job->jb }}"
                {{ old('jobs', $staff->jobs) == $job->jb ? 'selected' : '' }}>
                {{ $job->jb }}
            </option>
        @endforeach
    </select>
</div>
                            
                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            {{-- Tata Laksana Pasca Paparan --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Tata Laksana Pasca Paparan</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="fs-15 mt-3">Vaksin Anti Rabies</h6>
                                    @foreach(['var_dos12','var_dos3','var_dos4'] as $dose)
                                        <div class="mb-3">
                                            <label class="form-label">{{ ucfirst(str_replace('_',' ', $dose)) }}</label>
                                            <input type="date" 
                                                class="form-control" 
                                                id="{{ $dose }}" 
                                                name="{{ $dose }}" 
                                                value="{{ old($dose, $staff->$dose) }}">
                                            @if($dose != 'var_dos12')
                                                <small class="text-muted" id="rec-{{ $dose }}"></small>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol Submit --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-lg btn-success">Simpan Hasil Pemeriksaan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        @push('scripts')
        <script>
            // Rekomendasi tanggal suntik
            document.addEventListener("DOMContentLoaded", function() {
                const varDos12 = document.getElementById("var_dos12");
                const rec3 = document.getElementById("rec-var_dos3");
                const rec4 = document.getElementById("rec-var_dos4");

                function formatDate(date) {
                    return date.toISOString().split("T")[0];
                }

                function updateRecommendations() {
                    if (varDos12.value) {
                        const baseDate = new Date(varDos12.value);

                        const date3 = new Date(baseDate);
                        date3.setDate(baseDate.getDate() + 7);
                        rec3.textContent = "Rekomendasi tanggal: " + formatDate(date3);

                        const date4 = new Date(baseDate);
                        date4.setDate(baseDate.getDate() + 21);
                        rec4.textContent = "Rekomendasi tanggal: " + formatDate(date4);
                    } else {
                        rec3.textContent = "";
                        rec4.textContent = "";
                    }
                }

                varDos12.addEventListener("change", updateRecommendations);
                updateRecommendations();
            });
        </script>
        @endpush
    </div> <!-- container -->
</x-layoutnew.techmin>
