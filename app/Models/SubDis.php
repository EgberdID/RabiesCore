<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDis extends Model
{
    use HasFactory;

    protected $fillable = ['district_id', 'subdis_id', 'name', 'lat', 'lng'];

    // 🔗 Relasi ke District
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // 🔗 Relasi ke Village
    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    // 🔗 Relasi ke BiteCase
    public function biteCases()
    {
        return $this->hasMany(BiteCase::class);
    }
}
