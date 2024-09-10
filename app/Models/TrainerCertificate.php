<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerCertificate extends Model
{
    protected $primaryKey = 'tc_id';
    protected $fillable = [
        'tc_user_id', 'tc_certificate', 'tc_certificate_name', 'tc_expiry_date', 'tc_is_notify'
    ];
}

