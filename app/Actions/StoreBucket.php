<?php

namespace App\Actions;

use App\Events\EmptyAllBucketsEvent;
use App\Models\Bucket;

class StoreBucket
{
    public function handle($data): void
    {
        Bucket::create($data);
        event(new EmptyAllBucketsEvent());
    }
}
