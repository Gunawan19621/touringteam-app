<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Sparepart extends Model
{
    use HasFactory;
    protected $table = 'm_spareparts';
    protected $fillable = [
        'name',
        'est_price',
        'duration',
        'duration_type',
        'reminder',
        'status_reminder',
        'last_service',
        'description',
        'created_at',
        'updated_at',
    ];
}