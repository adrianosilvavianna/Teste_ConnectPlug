@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.create') }}</div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <form method="POST" action="{{ route('product.store') }}">
                            @csrf
                            <div class="form-group">
                              <label for="name">{{ __('app.name') }}</label>
                              <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.name') }}" name="name" >
                            </div>
                            <div class="form-group">
                              <label for="cod">{{ __('app.products.cod') }}</label>
                              <input type="text" class="form-control" id="cod" placeholder="{{ __('app.products.cod') }}" name="codigo" >
                            </div>
                            <div class="form-group">
                                <label for="file">{{ __('app.products.file') }}</label>
                                <input type="file" id="file" name="file_name">
                              </div>
                            <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
                        </form>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection