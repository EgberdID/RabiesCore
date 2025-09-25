<x-layoutnew.techmin>
    <div class="container-fluid">
        <form action="{{ route('bite_cases.update', $biteCase->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Identitas Pasien --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Identitas Pasien</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="user" value="{{ auth()->user()->name }}">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama lengkap</label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $biteCase->name) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                        <input type="text" id="nik" name="id_num" class="form-control" value="{{ old('id_num', $biteCase->id_num) }}">
                                        <small id="nik-feedback" class="text-danger d-none">NIK sudah terdaftar!</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_med" class="form-label">Nomor Rekam Medis</label>
                                        <input type="text" id="no_med" name="medrec_no" class="form-control" value="{{ old('medrec_no', $biteCase->medrec_no) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-textarea" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="example-textarea" rows="5" name="address">{{ old('address', $biteCase->address) }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pas_dis_id" class="form-label">Kecamatan Pasien</label>
                                        <select name="pas_dis_id" id="pas_dis_id" class="form-select">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach($districts as $d)
                                                <option value="{{ $d->id }}" {{ old('pas_dis_id', $biteCase->pas_dis_id) == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pas_subdis_id" class="form-label">Kelurahan Pasien</label>
                                        <select name="pas_subdis_id" id="pas_subdis_id" class="form-select">
                                            <option value="">-- Pilih Kelurahan --</option>
                                            @foreach($subdis as $sd)
                                                <option value="{{ $sd->id }}" {{ old('pas_subdis_id', $biteCase->pas_subdis_id) == $sd->id ? 'selected' : '' }}>{{ $sd->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="job" class="form-label">Pekerjaan</label>
                                        <select class="form-select" id="job" name="job">
                                            <option value="">-- Pilih Pekerjaan --</option>
                                            @foreach($jobs as $job)
                                                <option value="{{ $job->jb }}" {{ old('job', $biteCase->job) == $job->jb ? 'selected' : '' }}>{{ $job->jb }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="age" class="form-label">Umur</label>
                                        <input class="form-control" id="age" type="number" name="age" value="{{ old('age', $biteCase->age) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">No Telepon</label>
                                        <input class="form-control" id="phone" type="text" name="phone" value="{{ old('phone', $biteCase->phone) }}">
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            {{-- Informasi Kejadian Gigitan --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Informasi Kejadian Gigitan</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="mb-3">Lokasi & Waktu</h5>
                                    <div class="mb-3">
                                        <label for="case_day" class="form-label">Tanggal/Bulan/Tahun</label>
                                        <input class="form-control" id="case_day" type="date" name="case_day" value="{{ old('case_day', $biteCase->case_day) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="case_time" class="form-label">Waktu Gigitan</label>
                                        <input class="form-control" id="case_time" type="time" name="case_time" value="{{ old('case_time', $biteCase->case_time) }}">
                                    </div>
                                    {{-- <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="same_as_patient">
                                        <label class="form-check-label" for="same_as_patient">Sama dengan alamat pasien</label>
                                    </div> --}}

                                    <div class="mb-3">
                                        <label for="district" class="form-label">Kecamatan</label>
                                        <select name="district_id" id="district" class="form-select">
                                            <option value="">-- Pilih Kecamatan --</option>
                                            @foreach($districts as $d)
                                                <option value="{{ $d->id }}" {{ old('district_id', $biteCase->district_id) == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subdis" class="form-label">Kelurahan</label>
                                        <select name="sub_dis_id" id="subdis" class="form-select">
                                            <option value="">-- Pilih Kelurahan --</option>
                                            @foreach($subdis as $sd)
                                                <option value="{{ $sd->id }}" {{ (string) old('sub_dis_id', $biteCase->sub_dis_id) === 
                                                (string) $sd->id ? 'selected' : '' }}>{{ $sd->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="village" class="form-label">Lingkungan</label>
                                        <select name="village_id" id="village" class="form-select">
                                            <option value="">-- Pilih Lingkungan --</option>
                                            @foreach($villages as $v)
                                                <option value="{{ $v->id }}" {{ old('village_id', $biteCase->village_id) == $v->id ? 'selected' : '' }}>{{ $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3">Data Hewan</h5>
                                    <div class="mb-3">
                                        <label for="animal_type" class="form-label">Hewan Penular</label>
                                        <select class="form-select" id="animal_type" name="animal_type">
                                            <option value="">-- Pilih Hewan --</option>
                                            <option value="Anjing" {{ old('animal_type', $biteCase->animal_type) == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                                            <option value="Kucing" {{ old('animal_type', $biteCase->animal_type) == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                                            <option value="Kera" {{ old('animal_type', $biteCase->animal_type) == 'Kera' ? 'selected' : '' }}>Kera</option>
                                            <option value="Lainnya" {{ old('animal_type', $biteCase->animal_type) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="anim_stat" class="form-label">Status Hewan</label>
                                        <select class="form-select" id="anim_stat" name="animal_stat">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Milik Sendiri" {{ old('animal_stat', $biteCase->animal_stat) == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                            <option value="Liar" {{ old('animal_stat', $biteCase->animal_stat) == 'Liar' ? 'selected' : '' }}>Liar</option>
                                            <option value="tidak Diketahui" {{ old('animal_stat', $biteCase->animal_stat) == 'tidak Diketahui' ? 'selected' : '' }}>tidak Diketahui</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="animal_con" class="form-label">Kondisi Hewan Setelah Gigitan</label>
                                        <select class="form-select" id="animal_con" name="animal_con">
                                            <option value="">-- Pilih Kondisi --</option>
                                            <option value="Hidup" {{ old('animal_con', $biteCase->animal_con) == 'Hidup' ? 'selected' : '' }}>Hidup</option>
                                            <option value="Mati" {{ old('animal_con', $biteCase->animal_con) == 'Mati' ? 'selected' : '' }}>Mati</option>
                                            <option value="Hilang" {{ old('animal_con', $biteCase->animal_con) == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pemeriksaan Luka --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Pemeriksaan Luka</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="fs-15">Lokasi Gigitan</h6>
                                   @foreach(['Kepala/Leher','Jari Tangan/Kaki','Lengan','Tungkai','Badan','Genital'] as $bite)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="bite_mark[]" value="{{ $bite }}"
                                                {{ in_array($bite, old('bite_mark', $biteCase->bite_mark ? array_map('trim', explode(',', $biteCase->bite_mark)) : [])) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $bite }}</label>
                                        </div>
                                    @endforeach

                                    <h6 class="fs-15 mt-3">Jumlah Luka</h6>
                                    @foreach(['1','>1'] as $count)
                                        <div class="form-check">
                                            <input type="radio" id="bite_coun" name="bite_coun" value="{{ $count }}" class="form-check-input"
                                            {{ old('bite_coun', $biteCase->bite_coun) == $count ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $count == '>1' ? '>1 (lebih dari 1)' : $count }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="fs-15">Kedalaman Luka</h6>
                                    @foreach(['Superfisial','Dalam'] as $depth)
                                        <div class="form-check">
                                            <input type="radio" name="wound_ide" value="{{ $depth }}" class="form-check-input"
                                            {{ old('wound_ide', $biteCase->wound_ide) == $depth ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $depth }}</label>
                                        </div>
                                    @endforeach

                                    <h6 class="fs-15 mt-3">Kategori Paparan</h6>
                                    @foreach([
                                        "Kategori 1 (Kontak, Jilatan, Kulit utuh)",
                                        "Kategori 2 (Gigitan Ringan, Jilatan Pada Kulit Luka)",
                                        "Kategori 3 (Gigitan Berat, Multiple, Dekat Kepala/Leher, Jilatan Pada Mukosa)"
                                    ] as $cat)
                                        <div class="form-check">
                                            <input type="radio" name="exp_cat" value="{{ $cat }}" class="form-check-input"
                                            {{ old('exp_cat', $biteCase->exp_cat) == $cat ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $cat }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tata Laksana Pasca Paparan --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Tata Laksana Pasca Paparan</h4></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="fs-15">Pencucian Luka</h6>
                                    @foreach(['Ya','Tidak'] as $ans)
                                        <div class="form-check-inline">
                                            <input type="radio" name="inj_wash" value="{{ $ans }}" class="form-check-input"
                                            {{ old('inj_wash', $biteCase->inj_wash) == $ans ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $ans }}</label>
                                        </div>
                                    @endforeach

                                    <h6 class="fs-15 mt-3">Vaksin Anti Rabies</h6>
                                    @foreach(['var_dos12','var_dos3','var_dos4'] as $dose)
                                        <div class="mb-3">
                                            <label class="form-label">{{ ucfirst(str_replace('_',' ', $dose)) }}</label>
                                            <input type="date" class="form-control" name="{{ $dose }}" value="{{ old($dose, $biteCase->$dose) }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="fs-15">Serum Anti Rabies Diberikan?</h6>
                                    @foreach(['Ya','Tidak'] as $ans)
                                        <div class="form-check-inline">
                                            <input type="radio" name="req" value="{{ $ans }}" class="form-check-input"
                                            {{ old('req', $biteCase->req) == $ans ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $ans }}</label>
                                        </div>
                                    @endforeach
                                    <div class="mb-3 mt-3">
                                        <label class="form-label">Lokasi Penyuntikan</label>
                                        <input type="text" class="form-control" name="inj_loc" value="{{ old('inj_loc', $biteCase->inj_loc) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Riwayat Vaksin --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Riwayat Vaksin Sebelumnya</h4></div>
                        <div class="card-body">
                            <h6 class="fs-15">Pernah Vaksin Rabies?</h6>
                            @foreach(['Ya','Tidak'] as $ans)
                                <div class="form-check-inline">
                                    <input type="radio" name="his_vac" value="{{ $ans }}" class="form-check-input"
                                    {{ old('his_vac', $biteCase->his_vac) == $ans ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $ans }}</label>
                                </div>
                            @endforeach
                            <h6 class="fs-15 mt-3">Tahun Vaksin</h6>
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">Tanggal/Bulan/Tahun</label>
                                <input type="date" class="form-control" name="y_va" value="{{ old('y_va', $biteCase->y_va) }}">
                            </div>
                        
                    
                    <div class="mb-3 col-lg-6">
                                <label for="status1" class="form-label">Status Pasien</label>
                                    <select class="form-select" id="status1" name="status">
                                      <option></option>
                                       <option>Tidak Perlu Vaksin</option>
                                       <option>Perlu Booster</option>
                                       <option>Menunggu Vaksin Dosis 1 & 2</option>
                                       <option>Menunggu Vaksin Dosis 3</option>
                                       <option>Menunggu Vaksin Dosis 4</option>
                                      <option>Observasi Pasca Gigitan</option>
                                      <option>Observasi Pasca Vaksin</option>
                                        <option>Konsultasi Dokter</option>
                                        <option>Edukasi</option>
                                      <option>Sudah Selesai</option>
                                    </select>
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    // Load kelurahan kejadian
                    $('#district').on('change', function () {
                        var districtID = $(this).val();
                        if (districtID) {
                            $.get('/get-subdis/' + districtID, function (data) {
                                $('#subdis').empty().append('<option value="">-- Pilih Kelurahan --</option>');
                                $('#village').empty().append('<option value="">-- Pilih Lingkungan --</option>');
                                $.each(data, function (key, subdis) {
                                    $('#subdis').append('<option value="'+ subdis.id +'">'+ subdis.name +'</option>');
                                });
                            });
                        }
                    });

                    $('#subdis').on('change', function () {
                        var subdisID = $(this).val();
                        if (subdisID) {
                            $.get('/get-villages/' + subdisID, function (data) {
                                $('#village').empty().append('<option value="">-- Pilih Lingkungan --</option>');
                                $.each(data, function (key, village) {
                                    $('#village').append('<option value="'+ village.id +'">'+ village.name +'</option>');
                                });
                            });
                        }
                    });

                    // Load kelurahan pasien
                    $('#pas_dis_id').on('change', function () {
                        var districtID = $(this).val();
                        if (districtID) {
                            $.get('/get-subdis/' + districtID, function (data) {
                                $('#pas_subdis_id').empty().append('<option value="">-- Pilih Kelurahan --</option>');
                                $.each(data, function (key, subdis) {
                                    $('#pas_subdis_id').append('<option value="'+ subdis.id +'">'+ subdis.name +'</option>');
                                });
                            });
                        } else {
                            $('#pas_subdis_id').empty().append('<option value="">-- Pilih Kelurahan --</option>');
                        }
                    });

                    // Checkbox copy alamat
                    $('#same_as_patient').on('change', function () {
                        if (this.checked) {
                            let pasDis = $('#pas_dis_id').val();
                            let pasSubdis = $('#pas_subdis_id').val();
                          if (pasDis) {
    $.get('/get-subdis/' + pasDis, function(data) {
        $('#subdis').empty().append('<option value="">-- Pilih Kelurahan --</option>');
        $.each(data, function(key, subdis) {
            $('#subdis').append('<option value="'+ subdis.id +'" '+ (subdis.id == pasSubdis ? 'selected' : '') +'>'+ subdis.name +'</option>');
        });
    });
}

                            $('#district, #subdis').prop('disabled', true);
                        } else {
                            $('#district, #subdis').prop('disabled', false);
                        }
                    });
                });

                // Cek NIK
                document.getElementById('nik').addEventListener('blur', function () {
                    let nik = this.value;
                    if (nik.length > 0) {
                        fetch("{{ route('check.nik') }}?id_num=" + nik)
                            .then(response => response.json())
                            .then(data => {
                                let feedback = document.getElementById('nik-feedback');
                                if (data.exists) feedback.classList.remove('d-none');
                                else feedback.classList.add('d-none');
                            });
                    }
                });
                $(document).ready(function () {
    var selectedDistrict = $('#district').val();
    var selectedSubdis = "{{ old('sub_dis_id', $biteCase->sub_dis_id) }}";
    if(selectedDistrict && selectedSubdis) {
        $.get('/get-subdis/' + selectedDistrict, function(data) {
            $('#subdis').empty().append('<option value="">-- Pilih Kelurahan --</option>');
            $.each(data, function(key, subdis) {
                $('#subdis').append('<option value="'+ subdis.id +'" '+ (subdis.id == selectedSubdis ? 'selected' : '') +'>'+ subdis.name +'</option>');
            });
        });
    }
});

                
            </script>
        @endpush
    </div> <!-- container -->
</x-layoutnew.techmin>
