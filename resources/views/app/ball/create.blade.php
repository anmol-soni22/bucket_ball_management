<div class="col-md-6">
    <div class="card">
        <div class="card-header">Ball Form</div>
        <div class="card-body">

            <form method="POST" action="{{ route('balls.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ball Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="name"
                            class="form-control @error('name', 'createBallForm') is-invalid @enderror" name="name"
                            value="">

                        @error('name', 'createBallForm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="size"
                        class="col-md-4 col-form-label text-md-end">{{ __('Volume (In Inches)') }}</label>

                    <div class="col-md-6">
                        <input id="size" type="number" step="0.1"
                            class="form-control @error('size', 'createBallForm') is-invalid @enderror" name="size"
                            value="">

                        @error('size', 'createBallForm')
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
