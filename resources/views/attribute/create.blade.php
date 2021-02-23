@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.edit') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('attribute.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('app.name') }}</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.name') }}" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection