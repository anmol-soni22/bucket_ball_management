<?php

namespace App\Http\Controllers;

use App\Actions\StoreBucket;
use App\Http\Requests\StoreBucketRequest;
use Illuminate\Http\RedirectResponse;

class BucketStoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StoreBucketRequest $request, StoreBucket $storeBucket): RedirectResponse
    {
        $storeBucket->handle($request->validated());

        return to_route('home')->with('status', 'Bucket Stored Successfully');
    }
}
