<x-layoutnew.techmin>
    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class=".card-title mb-0"> Data Pasien</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div id="basicwizard">

                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                                                    <li class="nav-item">
                                                        <a href="#basictab1" data-bs-toggle="tab" data-toggle="tab"  class="nav-link rounded-0 py-2"> 
                                                            <i class="ri-account-circle-line fw-normal fs-20 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Data Diri</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="ri-profile-line fw-normal fs-20 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Informasi Kejadian</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="ri-profile-line fw-normal fs-20 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Pemeriksaan Luka</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab4" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="ri-profile-line fw-normal fs-20 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Tatalaksana Pasca Paparan</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#basictab5" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="ri-profile-line fw-normal fs-20 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Riwayat Vaksin</span>
                                                        </a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a href="#basictab3" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-2">
                                                            <i class="ri-check-double-line fw-normal fs-20 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Finish</span>
                                                        </a>
                                                    </li> --}}
                                                </ul>

                                                <div class="tab-content b-0 mb-0">
                                                    <div class="tab-pane" id="basictab1">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="name">Nama Pasien</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $biteCase->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="nik">Nomor Induk Kependudukan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="nik" name="id_num" value="{{ $biteCase->id_num }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="medrec_no">No Rekam Medis</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="medrec_no" name="medrec_no" value="{{ $biteCase->medrec_no }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="address">Alamat</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="address" name="address" value="{{ $biteCase->address }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="job">Pekerjaan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="job" name="job" value="{{ $biteCase->job }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="age">Umur</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="age" name="age" value="{{ $biteCase->age }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="phone">No Telepon</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $biteCase->phone }}">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="basictab2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="case_day"> Tanggal/Bulan/Tahun</label>
                                                                    <div class="col-md-9">
                                                                        <input type="date" id="case_day" name="case_day" class="form-control" value="{{ $biteCase->case_day }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="case_time"> Waktu Gigitan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="time" id="case_time" name="case_time" class="form-control" value="{{ $biteCase->case_time }}">
                                                                    </div>
                                                                </div>
                                        
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="district_id">Kecamatan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="district_id" name="district_id" class="form-control" value="{{ $biteCase->district_id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="sub_dis_id">Kelurahan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="sub_dis_id" name="sub_dis_id" class="form-control" value="{{ $biteCase->sub_dis_id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="village_id">Lingkungan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="village_id" name="village_id" class="form-control" value="{{ $biteCase->village_id }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="animal_type">Hewan Penular</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="animal_type" name="animal_type" class="form-control" value="{{ $biteCase->animal_type }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="animal_stat">Status Hewan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="animal_stat" name="animal_stat" class="form-control" value="{{ $biteCase->animal_stat }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="animal_con">Kondisi Hewan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="animal_con" name="animal_con" class="form-control" value="{{ $biteCase->animal_con }}">
                                                                    </div>
                                                                </div>                                                                
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane" id="basictab3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="bite_mark">Lokasi Gigitan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="bite_mark" name="bite_mark" class="form-control" value="{{ $biteCase->bite_mark }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="bite_coun">Jumlah Luka</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="bite_coun" name="bite_coun" class="form-control" value="{{ $biteCase->bite_coun }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="wound_ide">Kedalaman Luka</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="wound_ide" name="wound_ide" class="form-control" value="{{ $biteCase->wound_ide }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="exp_cat">Kategori Paparan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="exp_cat" name="exp_cat" class="form-control" value="{{ $biteCase->exp_cat }}">
                                                                    </div>
                                                                </div>                                                      
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="basictab4">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="inj_wash">Pencucian Luka</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="inj_wash" name="inj_wash" class="form-control" value="{{ $biteCase->inj_wash }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="var_dos12">Tanggal Dosis Pertama & Kedua</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="var_dos12" name="var_dos12" class="form-control" value="{{ $biteCase->var_dos12 }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="var_dos3">Tanggal Dosis Ketiga</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="var_dos3" name="var_dos3" class="form-control" value="{{ $biteCase->var_dos3 }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="var_dos4">Tanggal Dosis Keempat</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="var_dos4" name="var_dos4" class="form-control" value="{{ $biteCase->var_dos4 }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="req">Serum Anti Rabies Diberikan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="req" name="req" class="form-control" value="{{ $biteCase->req }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="inj_loc">Lokasi Penyuntikan</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="inj_loc" name="inj_loc" class="form-control" value="{{ $biteCase->inj_loc }}">
                                                                    </div>
                                                                </div>                                                      
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" id="basictab5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="his_vac">Pernah Vaksin Rabies</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="his_vac" name="his_vac" class="form-control" value="{{ $biteCase->his_vac }}">
                                                                    </div>
                                                                </div>                                                      
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="y_va">Tanggal/Bulan/Tahun</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="y_va" name="y_va" class="form-control" value="{{ $biteCase->y_va }}">
                                                                    </div>
                                                                </div>                                                      
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    {{-- <div class="tab-pane" id="basictab9">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="text-center">
                                                                    <h2 class="mt-0"><i class="ri-check-double-line"></i></h2>
                                                                    <h3 class="mt-0">Thank you !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                        mattis dictum aliquet.</p>

                                                                    <div class="mb-3">
                                                                        <div class="form-check d-inline-block">
                                                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                            <label class="form-check-label" for="customCheck1">I agree with the Terms and Conditions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->

                                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Profile</button>
                                                            </li>
                                                            <li class="next list-inline-item float-end">
                                                                <button type="button" class="btn btn-info">Submit</button>
                                                            </li>
                                                        </ul>
                                                    </div> --}}

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #basicwizard-->
                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->                          
</x-layoutnew.techmin>