<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;
    protected $table = 't_group_members';
    protected $fillable = [
        'group_id',
        'user_id',
        'status_approve',
        'status',
        'status_sos',
        'status_lead',
        'created_at',
        'updated_at',
    ];
}
