<div class="col-md-12 py-3">
    <div class="card">
        <div class="card-header">{{ __('Bucket Suggestion') }}</div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-6 py-3">
                    <form action="{{ route('ball-bucket-assignment') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-borderd">
                                <thead>
                                    <tr>
                                        <th>Ball Name</th>
                                        <th>No of Ball</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($balls as $ball)
                                    <tr>
                                        <td>{{ $ball->name }}</td>
                                        <td><input name="ball_ids[{{ $ball->id }}]" type="number" min="0" step="1" value="0"></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"><button class="btn btn-primary btn-xs">Place Ball in
                                                Bucket</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 py-3">

                    <div class="table-responsive">
                        <h2>Result</h2>
                        <h5>Following are the suggested buckets : </h5>
                        <table style="border-collapse: collapse; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #000; padding: 8px;">Bucket</th>
                                    <th style="border: 1px solid #000; padding: 8px;">Balls</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignments->groupBy('bucket_id') as $bucketId => $assignments)
                                <tr>
                                    <td style="border: 1px solid #000; padding: 8px;">Bucket {{$assignments->first()->bucket->name}}</td>
                                    <td style="border: 1px solid #000; padding: 8px;">
                                        @foreach ($assignments as $assignment)
                                        {{$assignment->no_of_ball}} {{$assignment->ball->name}} balls
                                        @if (!$loop->last) and @endif
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>