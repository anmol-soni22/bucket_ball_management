<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBallBucketAssignmentRequest;
use App\Models\Ball;
use App\Models\BallBucketAssignment;
use App\Models\Bucket;
use Illuminate\Http\RedirectResponse;

class BallBucketAssignmentController extends Controller
{
    public function __invoke(StoreBallBucketAssignmentRequest $request): RedirectResponse
    {
        // Validated input data from the request
        $data = $request->validated();

        // Retrieve all balls from the database
        $balls = Ball::get()->keyBy('id');

        // Retrieve buckets with their current occupied capacity
        $buckets = Bucket::withSum('assignments', 'occupied_capacity')->get();

        // Adjust remaining capacity of each bucket based on its current assignments
        $buckets = Bucket::withSum('assignments', 'occupied_capacity')
            ->get()
            ->each(function (Bucket $bucket) {
                $bucket->remaining_capacity = $bucket->capacity - ($bucket->assignments_sum_occupied_capacity ?? 0);
            })
            ->where('remaining_capacity', '>', 0)
            ->sortByDesc('capacity');

        // If no buckets can accommodate balls, redirect with error message
        if ($buckets->isEmpty()) {
            return redirect()->route('home')->with('error', 'All buckets are full');
        }

        // Determine the maximum capacity of any bucket and the maximum size of any ball
        $maxBucketCapacity = $buckets->max('capacity');
        $maxBallSize = $balls->max('size');

        // If the largest ball cannot fit into any bucket, redirect with error message
        if ($maxBallSize > $maxBucketCapacity) {
            $maxBall = $balls->where('size', $maxBallSize)->first();
            $maxBallName = $maxBall->name;
            $maxBallSize = $maxBall->size;
            return redirect()->route('home')->with('error', "No bucket can hold a ball of size $maxBallSize named $maxBallName");
        }
        // Array to hold ball-bucket assignments
        $ballBucketAssignment = [];

        // Array to hold selected balls
        $selectedBalls = [];

        // Collect selected balls based on the requested quantities
        foreach ($data['ball_ids'] as $ball_id => $quantity) {
            if ($quantity > 0 && isset($balls[$ball_id])) {
                $selectedBalls[] = [
                    'data' => $balls[$ball_id],
                    'quantity' => $quantity
                ];
            }
        }

        // Sort selected balls by size in descending order
        usort($selectedBalls, function ($a, $b) {
            return $b['data']->size - $a['data']->size;
        });

        // Now, iterate over the sorted balls
        foreach ($selectedBalls as $ball) {
            foreach ($buckets as $bucket) {
                $remainingCapacity = $bucket->remaining_capacity;

                if ($remainingCapacity > 0) {
                    $ballsToAssign = min($ball['quantity'], floor($remainingCapacity / $ball['data']->size));

                    if ($ballsToAssign <= 0) {
                        continue;
                    }

                    $requiredCapacity = $ball['data']->size * $ballsToAssign;
                    $ball['quantity'] = $ball['quantity'] - $ballsToAssign;

                    // Record the ball-bucket assignment
                    $ballBucketAssignment[] = [
                        'ball_id' => $ball['data']->id,
                        'bucket_id' => $bucket->id,
                        'no_of_ball' => $ballsToAssign,
                        'occupied_capacity' => $requiredCapacity,
                    ];

                    // Update the remaining capacity of the bucket
                    $bucket->remaining_capacity -= $requiredCapacity;
                    if ($ball['quantity'] == 0) {
                        break;
                    }
                }
            }
        }

        // If no balls were assigned to any bucket, redirect with error message
        if (empty($ballBucketAssignment)) {
            return redirect()->route('home')->with('error', 'Error: No balls assigned to any bucket. Please select a different ball or create a new bucket.');
        }
        // Insert the assignment data into the database
        BallBucketAssignment::insert($ballBucketAssignment);

        // Calculate the total number of balls requested to be placed
        $totalBallsRequested = array_sum($data['ball_ids']);

        // Calculate the total number of balls assigned to buckets
        $totalBallsAssigned = array_sum(array_column($ballBucketAssignment, 'no_of_ball'));

        // Check if the total number of balls assigned does not match the total number of balls requested
        $unplacedBalls = $totalBallsRequested - $totalBallsAssigned;
        if ($unplacedBalls > 0) {
            return redirect()->route('home')->with('error', "Error: We were unable to place $unplacedBalls balls");
        }

        return redirect()->route('home')->with('success', 'Bucket Assigned successfully');
    }
}
