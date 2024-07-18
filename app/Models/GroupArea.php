<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupArea extends Model
{
    use HasFactory;
    protected $table = 't_group_areas';
    protected $fillable = [
        'group_id',
        'type',
        'name',
        'area',
        'sort',
        'created_at',
        'updated_at',
    ];
}
