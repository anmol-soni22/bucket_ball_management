<?php

namespace App\Http\Controllers;

use App\Actions\StoreBall;
use App\Http\Requests\StoreBallRequest;
use Illuminate\Http\RedirectResponse;

class BallStoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StoreBallRequest $request, StoreBall $storeBall): RedirectResponse
    {
        $storeBall->handle($request->validated());

        return to_route('home')->with('status', 'Ball Stored Successfully');
    }
}
