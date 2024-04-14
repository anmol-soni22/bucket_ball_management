<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BallBucketAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['ball_id', 'bucket_id', 'no_of_ball', 'occupied_capacity'];

    public function ball(): BelongsTo
    {
        return $this->belongsTo(Ball::class);
    }

    public function bucket(): BelongsTo
    {
        return $this->belongsTo(Bucket::class);
    }
}
