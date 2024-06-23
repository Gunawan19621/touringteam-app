<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Group extends Model
{
    use HasFactory;
    protected $table = 't_groups';
    protected $fillable = [
        'name',
        'description',
        'send_notif',
        'distance',
        'created_at',
        'updated_at',
    ];
}
