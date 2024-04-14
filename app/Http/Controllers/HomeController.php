<?php

namespace App\Http\Controllers;

use App\Models\Ball;
use App\Models\BallBucketAssignment;
use App\Models\Bucket;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke():View
    {
        $buckets = Bucket::select('id', 'name', 'capacity')->withSum('assignments', 'occupied_capacity')->get();
        $balls = Ball::get(['id', 'name', 'size']);
        $assignments = BallBucketAssignment::with('bucket:id,name', 'ball:id,name')->select('ball_id', 'bucket_id', DB::raw('round(sum(no_of_ball)) as no_of_ball'))->groupBy('ball_id', 'bucket_id')->get();

        return view('app.home', [
            'buckets' => $buckets,
            'balls' => $balls,
            'assignments' => $assignments,
        ]);
    }
}
