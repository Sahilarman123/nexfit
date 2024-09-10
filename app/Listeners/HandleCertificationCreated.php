<?php

namespace App\Listeners;

use App\Events\CertificationCreated;

class HandleCertificationCreated
{
    public function handle(CertificationCreated $event)
    {
        // Handle post-creation logic (e.g., sending notifications)
    }
}

