<x-layoutnew.techmin>
   <div class="container-fluid">
        <form action="{{ route('staff_vac.store') }}" method="POST" class="space-y-4">
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
                                                    <label for="nip1" class="form-label">Nomor Induk Pegawai</label>
                                                    <input type="text" id="nip1" name="nip" class="form-control" placeholder="">
                                                    <small id="nip-feedback" class="text-danger d-none">NIP sudah terdaftar!</small>
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
                                        </div> <!-- end col -->

                                        <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="fas" class="form-label">Fasilitas Kesehatan Asal</label>
                                                    <input type="text" id="fas" name="faskes" class="form-control" placeholder="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="job" class="form-label">Pekerjaan</label>
                                                    <select class="form-select" id="job" name="jobs">
                                                        <option value="">-- Pilih Pekerjaan --</option>
                                                        @foreach($jobs as $job)
                                                            <option value="{{ $job->jb }}">{{ $job->jb }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>                                                                
                                        </div> <!-- end col -->
                                    </div>
                                    <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title mt-lg-0">B. Pemberian Vaksin </h4>
                                </div>
                                <div class="card-body">
                                    <div class="class row">
                                        <div class="class col-lg-6">
                                        
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
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                         <div class="col-lg-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class=".card-title mt-lg-0">E. Riwayat Vaksin Sebelumnya</h4>
                                </div>--}}
                                <div class="card-body">
                                    {{--<h6 class="fs-15">Pernah Vaksin Rabies?</h6>
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
