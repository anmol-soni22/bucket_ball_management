<div class="col-md-6">
    <div class="card">
        <div class="card-header">Bucket Form</div>
        <div class="card-body">

            <form method="POST" action="{{ route('buckets.store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name"
                        class="col-md-4 col-form-label text-md-end">{{ __('Bucket Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="name"
                            class="form-control @error('name', 'createBucketForm') is-invalid @enderror"
                            name="name" value="">

                        @error('name', 'createBucketForm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="capacity"
                        class="col-md-4 col-form-label text-md-end">{{ __('Volume (In Inches)') }}</label>

                    <div class="col-md-6">
                        <input id="capacity" type="number" step="0.1"
                            class="form-control @error('capacity', 'createBucketForm') is-invalid @enderror"
                            name="capacity" value="">

                        @error('capacity', 'createBucketForm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
