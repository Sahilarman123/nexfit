<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $primaryKey = 'sp_id';
    protected $fillable = ['sp_name'];
}

