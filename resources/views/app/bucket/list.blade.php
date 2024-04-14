<div class="col-md-6 py-3">
    <div class="card">
        <div class="card-header">Bucket List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Bucket Name</th>
                            <th>Bucket Capacity</th>
                            <th>Occupied Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buckets as $bucket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bucket->name }}</td>
                                <td>{{ $bucket->capacity }}</td>
                                <td>{{ $bucket->assignments_sum_occupied_capacity ?? 0}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        
        </div>

    </div>
</div>
