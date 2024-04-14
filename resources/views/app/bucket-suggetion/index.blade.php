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
                                            <td><input name="ball_ids[{{ $ball->id }}]" type="number"
                                                    min="0" step="1" value="0"></td>
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
                        <ul>
                            @foreach ($assignments as $assignment)
                                <li>{{$assignment->bucket->name}}: Place {{$assignment->no_of_ball}} {{$assignment->ball->name}} balls</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
