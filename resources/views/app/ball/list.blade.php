<div class="col-md-6 py-3">
    <div class="card">
        <div class="card-header">Ball List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Ball Name</th>
                            <th>Ball Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balls as $ball)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ball->name }}</td>
                                <td>{{ $ball->size }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
