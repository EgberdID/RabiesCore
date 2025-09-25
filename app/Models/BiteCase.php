<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiteCase extends Model
{
    use HasFactory;

    protected $table = 'bite_cases';

    protected $fillable = [
    'name', 'id_num', 'medrec_no', 'address', 'pas_dis_id', 'pas_subdis_id', 'job', 'age', 'phone',
    'case_day', 'case_time', 'district_id', 'sub_dis_id', 'village_id',
    'animal_type', 'animal_stat', 'animal_con',
    'bite_mark', 'bite_coun', 'wound_ide', 'exp_cat',
    'inj_wash', 'var_dos12', 'var_dos3', 'var_dos4',
    'req', 'inj_loc', 'his_vac', 'y_va','treatment','notes','user', 'status'
];


    public function district() {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function subDis() {
        return $this->belongsTo(SubDis::class, 'sub_dis_id');
    }

    public function village() {
        return $this->belongsTo(Village::class, 'village_id');
    }
    public function pas_district() {
        return $this->belongsTo(District::class, 'pas_dis_id');
    }

    public function pas_subDis() {
        return $this->belongsTo(SubDis::class, 'pas_subdis_id');
    }
}
