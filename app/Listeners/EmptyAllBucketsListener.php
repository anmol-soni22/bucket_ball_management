<?php

namespace App\Listeners;

use App\Models\BallBucketAssignment;

class EmptyAllBucketsListener
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        BallBucketAssignment::truncate();
    }
}
