<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
    'name', 'nip', 'id_num', 'address',  'faskes', 'jobs',
    'var_dos12', 'var_dos3', 'var_dos4','user'

];
}