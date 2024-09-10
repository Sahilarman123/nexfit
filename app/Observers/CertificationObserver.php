<?php

namespace App\Observers;

use App\Models\Certification;
use App\Events\CertificationCreated;
use App\Events\CertificationUpdated;
use App\Events\CertificationDeleted;

class CertificationObserver
{
    public function created(Certification $certification)
    {
        event(new CertificationCreated($certification));
    }

    public function updated(Certification $certification)
    {
        event(new CertificationUpdated($certification));
    }

    public function deleted(Certification $certification)
    {
        event(new CertificationDeleted($certification));
    }
}

