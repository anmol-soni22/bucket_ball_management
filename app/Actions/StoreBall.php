<?php

namespace App\Actions;

use App\Events\EmptyAllBucketsEvent;
use App\Models\Ball;

class StoreBall
{
    public function handle($data): void
    {
        Ball::create($data);
        event(new EmptyAllBucketsEvent());
    }
}
