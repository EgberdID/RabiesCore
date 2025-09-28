<x-layoutnew.techmin>
   <div class="container-fluid">
        <form action="{{ route('bite_cases.store') }}" method="POST" class="space-y-4">
            @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title">A. Identitas Pasien</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="hidden" name="user" value="{{ auth()->user()->name }}">
                                            
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nama lengkap </label>
                                                    <input type="text" id="name" class="form-control" name="name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                                                    <input type="text" id="nik" name="id_num" class="form-control" placeholder="">
                                                    <small id="nik-feedback" class="text-danger d-none">NIK sudah terdaftar!</small>
                                                </div>                                                
                         
                                                <div class="mb-3">
                                                    <label for="example-textarea" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="example-textarea"
                                                        rows="5" name="address"></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="pas_dis_id" class="form-label">Kecamatan Pasien</label>
                                                    <select name="pas_dis_id" id="pas_dis_id" class="form-select">
                                                        <option value="">-- Pilih Kecamatan --</option>
                                                        @foreach($districts as $d)
                                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="pas_subdis_id" class="form-label">Kelurahan Pasien</label>
                                                    <select name="pas_subdis_id" id="pas_subdis_id" class="form-select">
                                                        <option value="">-- Pilih Kelurahan --</option>
                                                    </select>
                                                </div>


                                                {{-- <div class="mb-3">
                                                    <label for="example-static" class="form-label">Static
                                                        control</label>
                                                    <input type="text" readonly class="form-control-plaintext"
                                                        id="example-static" value="email@example.com">
                                                </div> --}}
                                        </div> <!-- end col -->

                                        <div class="col-lg-6">
                                            
                                                <div class="mb-3">
                                                    <label for="job" class="form-label">Pekerjaan</label>
                                                    <select class="form-select" id="job" name="job">
                                                        <option value="">-- Pilih Pekerjaan --</option>
                                                        @foreach($jobs as $job)
                                                            <option value="{{ $job->jb }}">{{ $job->jb }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                        
                                                <div class="mb-3">
                                                    <label for="age" class="form-label">Umur</label>
                                                    <input class="form-control" id="age" type="number"
                                                        name="age">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">No Telepon</label>
                                                    <input class="form-control" id="phone" type="text"
                                                        name="phone">
                                                </div>
                                                
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class=".card-title">B. Informasi Kejadian Gigitan</h4>                                    
                                    </div>
                                 
                                    <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <h5 class="mb-3">Lokasi & Waktu</h5>

                                                <div class="mb-3">
                                                    <label for="case_day" class="form-label">Tanggal/Bulan/Tahun</label>
                                                    <input class="form-control" id="case_day" type="date"
                                                            name="case_day">
                                                </div>
                                            
                                                <div class="mb-3">
                                                        <label for="case_time" class="form-label">Waktu Gigitan</label>
                                                        <input class="form-control" id="case_time" type="time"
                                                            name="case_time">
                                                </div> 
                                                
                                                {{-- <div class="form-check mb-3">
                                                    <input type="checkbox" class="form-check-input" id="same_as_patient">
                                                    <label class="form-check-label" for="same_as_patient">
                                                        Sama dengan alamat pasien
                                                    </label>
                                                </div> --}}

                                                
                                                <div class="mb-3">
                                                    <label for="example-select" class="form-label">Kecamatan</label>
                                                    <select name="district_id" id="district" class="form-select">
                                                        <option value="">-- Pilih Kecamatan --</option>
                                                        @foreach($districts as $d)
                                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                 <div class="mb-3">
                                                    <label for="example-select" class="form-label">Kelurahan</label>
                                                    <select name="sub_dis_id" id="subdis" class="form-select">
                                                        <option value="">-- Pilih Kelurahan --</option>
                                                    </select>
                                                </div>                                        
                                                 <div class="mb-3">
                                                    <label for="example-select" class="form-label">Lingkungan</label>
                                                    <select name="village_id" id="village" class="form-select">
                                                        <option value="">-- Pilih Lingkungan --</option>
                                                    </select>
                                                </div>                                   
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="mb-3">Data Hewan</h5>

                                                <div class="mb-3">
                                                    <label for="animal_type" class="form-label">Hewan Penular</label>
                                                    <select class="form-select" id="animal_type" name="animal_type">
                                                        <option></option>
                                                        <option>Anjing</option>
                                                        <option>Kucing</option>
                                                        <option>Kera</option>
                                                        <option>Lainnya</option>
                                                    </select>
                                                </div>
                                            
                                                <div class="mb-3">
                                                    <label for="animal_stat" class="form-label">Status Hewan</label>
                                                    <select class="form-select" id="anim_stat" name="animal_stat">
                                                        <option></option>
                                                        <option>Milik Sendiri</option>
                                                        <option>Liar</option>
                                                        <option>Tidak Diketahui</option>
                                                    </select>
                                                </div> 

                                                <div class="mb-3">
                                                    <label for="animal_con" class="form-label">Kondisi Hewan Setelah Gigitan</label>
                                                    <select class="form-select" id="animal_con" name="animal_con">
                                                        <option></option>
                                                        <option>Hidup</option>
                                                        <option>Mati</option>
                                                        <option>Hilang</option>
                                                    </select>
                                                </div>                                        
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title mt-lg-0">C. Pemeriksaan Luka</h4>
                                   
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h6 class="fs-15">Lokasi Gigitan</h6>
                                            <div class="mt-3">
                                               <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="bite_kepala" name="bite_mark[]" value="Kepala/Leher">
                                                    <label class="form-check-label" for="bite_kepala">Kepala/Leher</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="bite_jari" name="bite_mark[]" value="Jari Tangan/Kaki">
                                                    <label class="form-check-label" for="bite_jari">Jari Tangan/Kaki</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="bite_lengan" name="bite_mark[]" value="Lengan">
                                                    <label class="form-check-label" for="bite_lengan">Lengan</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="bite_tungkai" name="bite_mark[]" value="Tungkai">
                                                    <label class="form-check-label" for="bite_tungkai">Tungkai</label>
                                                </div>

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="bite_badan" name="bite_mark[]" value="Badan">
                                                    <label class="form-check-label" for="bite_badan">Badan</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="bite_Genital" name="bite_mark[]" value="Genital">
                                                    <label class="form-check-label" for="bite_Genital">Genital</label>
                                                </div>

                                            </div>

                                            <h6 class="fs-15 mt-3">Jumlah Luka</h6>
                                            <div class="mt-2">
                                                <div class="form-check form-check">
                                                    <input type="radio" id="bite_coun" name="bite_coun"
                                                        class="form-check-input" value="1">
                                                    <label class="form-check-label" for="1">1</label>
                                                </div>
                                                <div class="form-check form-check mt-0,5">
                                                    <input type="radio" id="bite_coun" name="bite_coun"
                                                        class="form-check-input" value=">1">
                                                    <label class="form-check-label" for=">1">>1 (lebih dari 1)</label>
                                                </div>
                                            </div>
                                        </div>
                                    

                                        <div class="class col-lg-6">
                                    <h6 class="fs-15">Kedalaman Luka</h6>
                                    <div class="mt-2">
                                        <div class="form-check form-check">
                                            <input type="radio" id="wound_ide" name="wound_ide" value="Superfisial"
                                                class="form-check-input">
                                            <label class="form-check-label" for="wound_ide" >Superfisial</label>
                                        </div>
                                        <div class="form-check form-check">
                                            <input type="radio" id="wound_ide" name="wound_ide" value="Dalam"
                                                class="form-check-input">
                                            <label class="form-check-label" for="wound_ide" >Dalam</label>
                                        </div>
                                    </div>
                                    <h6 class="fs-15 mt-3">Kategori Paparan</h6>
                                    <div class="mt-2">
                                        <div class="form-check form-check">
                                            <input type="radio" id="exp_cat" name="exp_cat" value="Kategori 1 (Kontak, Jilatan, Kulit utuh)"
                                                class="form-check-input">
                                            <label class="form-check-label" for="exp_cat" >Kategori 1 (Kontak, Jilatan, Kulit Utuh)</label>
                                        </div>
                                        <div class="form-check form-check">
                                            <input type="radio" id="exp_cat" name="exp_cat" value="Kategori 2 (Gigitan Ringan, Jilatan Pada Kulit Luka)"
                                                class="form-check-input">
                                            <label class="form-check-label" for="exp_cat" >Kategori 2 (Gigitan Ringan, Jilatan Pada Kulit Luka)</label>
                                        </div>
                                        <div class="form-check form-check">
                                            <input type="radio" id="exp_cat" name="exp_cat" value="Kategori 3 (Gigitan Berat, Multiple, Dekat Kepala/Leher, Jilatan Pada Mukosa)"
                                                class="form-check-input">
                                            <label class="form-check-label" for="exp_cat" >Kategori 3 (Gigitan Berat, Multiple, Dekat Kepala/Leher, Jilatan Pada Mukosa)</label>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                                                   
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title mt-lg-0">D. TataLaksana Pasca Paparan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="class row">
                                        <div class="class col-lg-6">
                                            <h6 class="fs-15">Pencucian Luka</h6>
                                            <div class="mt-3">
                                                <div class="form-check-inline">
                                                    <input type="radio" id="inj_wash" name="inj_wash" value="Ya"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="inj_wash" >Ya</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" id="inj__wash" name="inj_wash" value="Tidak"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="inj_wash" >Tidak</label>
                                                </div>
                                            </div>

                                            <h6 class="fs-15 mt-3">Vaksin Anti Rabies</h6>

                                            <div class="mb-3">
                                                <label for="example-date" class="form-label">Tanggal Dosis Pertama & Kedua</label>
                                                <input class="form-control" id="var_dos12" type="date"
                                                                    name="var_dos12">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-date" class="form-label">Tanggal Dosis Ketiga</label>
                                                <input class="form-control" id="var_dos3" type="date"
                                                                    name="var_dos3">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-date" class="form-label">Tanggal Dosis Keempat</label>
                                                <input class="form-control" id="var_dos4" type="date"
                                                                    name="var_dos4">
                                            </div>
                                        </div>

                                        <div class="class col-lg-6">
                                            <h6 class="fs-15 ">Serum Anti Rabies Diberikan?</h6>
                                            <div class="mt-3">
                                                <div class="form-check-inline">
                                                    <input type="radio" id="req1" name="req" value="Ya"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="req" >Ya</label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input type="radio" id="req" name="req" value="Tidak"
                                                        class="form-check-input">
                                                    <label class="form-check-label" for="req" >Tidak</label>
                                                </div>
                                            </div>

                                            <div class="mb-3 mt-3">
                                                <label for="inj_loc" class="form-label"> Lokasi Penyuntikan </label>
                                                <input type="text" id="inj_loc" name="inj_loc" class="form-control">
                                            </div>  
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                         <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title mt-lg-0">E. Riwayat Vaksin Sebelumnya</h4>
                                </div>
                                <div class="card-body">
                                    <h6 class="fs-15">Pernah Vaksin Rabies?</h6>
                                    <div class="mt-3">
                                        <div class="form-check-inline">
                                            <input type="radio" id="history" name="his_vac" value="Ya"
                                                class="form-check-input">
                                            <label class="form-check-label" for="history" >Ya</label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input type="radio" id="history" name="his_vac" value="Tidak"
                                                class="form-check-input">
                                            <label class="form-check-label" for="history" >Tidak</label>
                                        </div>
                                    </div>

                                    <h6 class="fs-15 mt-3">Tahun Vaksin</h6>

                                    <div class="mb-3 col-lg-6">
                                        <label for="y_va" class="form-label">Tanggal/Bulan/Tahun</label>
                                        <input class="form-control" id="y_va" type="date"
                                                            name="y_va">
                                    </div> 
                                  {{-- <div class="mb-3 col-lg-6">
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
                                        <option >Edukasi</option>
                                      <option>Sudah Selesai</option>
                                    </select>
                            </div>    --}}
                           

                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-lg btn-success">Simpan Hasil Pemeriksaan</button>
                                                    </div>

                                                </div> <!-- end card-body -->
                                            </div> <!-- end card-->
                                    </div> <!-- end col -->                                                               

                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                        
                    </div>
                    <!-- end row -->
        </form>
            @push('scripts')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function () {
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
            });
            </script>
            <script>
                document.getElementById('nik').addEventListener('blur', function () {
                    let nik = this.value;

                    if (nik.length > 0) {
                        fetch("{{ route('check.nik') }}?id_num=" + nik)
                            .then(response => response.json())
                            .then(data => {
                                let feedback = document.getElementById('nik-feedback');
                                if (data.exists) {
                                    feedback.classList.remove('d-none');
                                } else {
                                    feedback.classList.add('d-none');
                                }
                            });
                    }
                });
                </script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                
                <script>
                $(document).ready(function () {
                    // Load kelurahan pasien saat pilih kecamatan pasien
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

                    // Checkbox untuk copy alamat pasien ke kejadian
                    $('#same_as_patient').on('change', function () {
                        if (this.checked) {
                            let pasDis = $('#pas_dis_id').val();
                            let pasSubdis = $('#pas_subdis_id').val();

                            if (pasDis) {
                                // set kecamatan kejadian
                                $('#district').val(pasDis).trigger('change');

                                // tunggu kelurahan kejadian selesai dimuat baru set
                                $(document).ajaxStop(function() {
                                    $('#subdis').val(pasSubdis).trigger('change');
                                    $(document).off("ajaxStop"); // supaya tidak dipanggil terus²an
                                });
                            }

                            // lock field supaya tidak bisa diubah manual
                            $('#district, #subdis').prop('disabled', true);
                        } else {
                            $('#district, #subdis').prop('disabled', false);
                        }
                    });
                });
                </script>
                

            @endpush
    </div> <!-- container -->

</x-layoutnew.techmin>
