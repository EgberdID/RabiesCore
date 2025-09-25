<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = ['subdis_id', 'villages_id', 'name'];

    // 🔗 Relasi ke SubDis
    public function subDis()
    {
        return $this->belongsTo(SubDis::class);
    }

    // 🔗 Relasi ke BiteCase
    public function biteCases()
    {
        return $this->hasMany(BiteCase::class);
    }
}
