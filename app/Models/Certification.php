<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
    {
        use HasFactory;

        protected $table = 'certificates';
        protected $primaryKey = 'c_id';

        protected $fillable = [
            'c_name',
        ];

    }

