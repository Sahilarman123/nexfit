<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_no', 'date_of_birth',
        'gender', 'address', 'city', 'state', 'postal_code', 'country', 'password'
    ];

    protected $hidden = ['password'];

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }
}

