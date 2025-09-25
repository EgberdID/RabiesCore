<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'district'; //rubah nama
    protected $fillable = ['city_id', 'name'];

    //  Relasi ke SubDis
    public function subDis()
    {
        return $this->hasMany(SubDis::class);
    }

    // Relasi ke BiteCase
    public function biteCases()
    {
        return $this->hasMany(BiteCase::class);
    }
}

