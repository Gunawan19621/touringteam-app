<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Role extends Model
{
    use HasFactory;
    protected $table = 'm_roles';
    protected $fillable = [
        'rolename',
        'description',
        'created_at',
        'updated_at',
    ];
}
