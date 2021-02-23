@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.edit') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('attribute.update', [$attribute->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('app.name') }}</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.name') }}" name="name" value="{{ $attribute->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
                    </form>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @foreach($attribute->Types as $type)
                                {{ $type->name }}

                                <form action="{{ route('attribute_type.delete', [$type->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input class="btn btn-default" type="submit" value="Delete" />
                                    
                                </form>

                            @endforeach
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection