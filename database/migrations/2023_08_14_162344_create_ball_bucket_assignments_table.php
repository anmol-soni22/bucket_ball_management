<?php

use App\Models\Ball;
use App\Models\Bucket;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ball_bucket_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ball::class)->constrained();
            $table->foreignIdFor(Bucket::class)->nullable()->constrained();
            $table->integer('no_of_ball')->default(0);
            $table->float('occupied_capacity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ball_bucket_assignments');
    }
};
