<?php

namespace App\Events;

use App\Models\Certification;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CertificationCreated
{
    use Dispatchable, SerializesModels;

    public $certification;

    public function __construct(Certification $certification)
    {
        $this->certification = $certification;
    }
}

