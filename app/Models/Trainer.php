<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Trainer extends Authenticatable
{
    protected $primaryKey = 'trainer_id';

    protected $fillable = [
        'trainer_name', 'trainer_last_name', 'trainer_mobile_prefix', 
        'trainer_mobile', 'trainer_qr', 'trainer_email', 'trainer_status',
        'trainer_step', 'trainer_password', 'trainer_gender', 'trainer_dob', 
        'trainer_address', 'trainer_city', 'trainer_state', 'trainer_pincode',
        'trainer_country'
    ];

    protected $hidden = [
        'trainer_password', // This will hide the password field when converting to array or JSON
    ];

    // Optionally, if you have a custom column for username, set it here
    public function getAuthPassword()
    {
        return $this->trainer_password;
    }
}
