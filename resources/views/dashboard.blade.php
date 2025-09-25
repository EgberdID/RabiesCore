<x-layoutnew.techmin>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Data Kasus Gigitan</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No Rekam Medis</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <th>Umur</th>
                                    <th>Telepon</th>
                                    <th>Tanggal Kasus</th>
                                    <th>Waktu Kasus</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Lingkungan</th>
                                    <th>Jenis Hewan</th>
                                    <th>Status Hewan</th>
                                    <th>Kondisi Hewan</th>
                                    <th>Tanda Gigitan</th>
                                    <th>Jumlah Luka</th>
                                    <th>Identifikasi Luka</th>
                                    <th>Kategori Ekspose</th>
                                    <th>Pencucian Luka</th>
                                    <th>Dosis Vaksin 1/2</th>
                                    <th>Dosis Vaksin 3</th>
                                    <th>Dosis Vaksin 4</th>
                                    <th>RIG</th>
                                    <th>Lokasi Suntikan</th>
                                    <th>Riwayat Vaksinasi</th>
                                    <th>Tanggal Vaksin Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($biteCases as $case)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $case->name }}</td>
                                        <td>{{ $case->id_num }}</td>
                                        <td>{{ $case->medrec_no }}</td>
                                        <td>{{ $case->address }}</td>
                                        <td>{{ $case->job }}</td>
                                        <td>{{ $case->age }}</td>
                                        <td>{{ $case->phone }}</td>
                                        <td>{{ $case->case_day }}</td>
                                        <td>{{ $case->case_time }}</td>
                                        <td>{{ $case->district?->name }}</td>
                                        <td>{{ $case->subDis?->name }}</td>
                                        <td>{{ $case->village?->name }}</td>
                                        <td>{{ $case->animal_type }}</td>
                                        <td>{{ $case->animal_stat }}</td>
                                        <td>{{ $case->animal_con }}</td>
                                        <td>{{ $case->bite_mark }}</td>
                                        <td>{{ $case->bite_coun }}</td>
                                        <td>{{ $case->wound_ide }}</td>
                                        <td>{{ $case->exp_cat }}</td>
                                        <td>{{ $case->inj_wash }}</td>
                                        <td>{{ $case->var_dos12 }}</td>
                                        <td>{{ $case->var_dos3 }}</td>
                                        <td>{{ $case->var_dos4 }}</td>
                                        <td>{{ $case->req }}</td>
                                        <td>{{ $case->inj_loc }}</td>
                                        <td>{{ $case->his_vac }}</td>
                                        <td>{{ $case->y_va }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layoutnew.techmin>
