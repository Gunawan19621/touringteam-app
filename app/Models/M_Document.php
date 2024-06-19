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
        'description',
        'reminder',
        'duration_type',
        'status_reminder',
        'created_at',
        'updated_at',
    ];
}