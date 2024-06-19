<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Transportation extends Model
{
    use HasFactory;
    protected $table = 'm_transportations';
    protected $fillable = [
        'type',
        'name',
        'machine',
        'thn_beli',
        'thn_rakit',
        'plat_no',
        'foto_kendaraan',
        'description',
        'created_at',
        'updated_at',
    ];
}
