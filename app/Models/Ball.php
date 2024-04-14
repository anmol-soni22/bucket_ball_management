<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ball extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'size'];

    public function assignments()
    {
        return $this->hasMany(BallBucketAssignment::class);
    }
}
