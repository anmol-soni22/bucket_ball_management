@extends('layouts.app')

@section('content')
    @include('components.alert')
    @include('app.bucket.create')
    @include('app.ball.create')

    @includeWhen($buckets->isNotEmpty(),'app.bucket.list')
    @includeWhen($balls->isNotEmpty(),'app.ball.list')
    @includeWhen($buckets->isNotEmpty()&& $balls->isNotEmpty() ,'app.bucket-suggetion.index')
@endsection
