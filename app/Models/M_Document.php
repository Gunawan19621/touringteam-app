<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Document extends Model
{
    use HasFactory;
    protected $table = 'm_documents';
    protected $fillable = [
        'name',
        'expired',
        'duration',
        'duration_type',
        'created_at',
        'updated_at',
    ];
}
