@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('app.edit') }}
                    <a href="{{ route('attribute.index') }}" class="badge float-right">{{ __('app.attribute') }}</a>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('attribute_type.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('app.name') }}</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.name') }}" name="name">
                            <input type="text" hidden name="attribute_id" value="{{ $attribute_id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection