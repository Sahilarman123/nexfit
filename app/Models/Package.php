<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $primaryKey = 'p_id';
    protected $fillable = [
        'p_user_id', 'p_session', 'p_schedule', 'p_minutes', 'p_rate', 
        'p_discount', 'p_total', 'p_net_total', 'p_is_deleted'
    ];
}
