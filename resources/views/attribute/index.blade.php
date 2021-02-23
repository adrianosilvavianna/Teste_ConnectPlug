@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('app.products.all') }}
                    <a href="{{ route('attribute.create') }}" class="badge float-right">{{ __('app.create') }}</a>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        @forelse   ($attributes as $attribute)
                            <li class="list-group-item">
                                
                                {{ $attribute->name }} | 

                                @foreach($attribute->Types as $type)
                                    <span class="badge bg-success">{{ $type->name }}</span>
                                @endforeach

                                <a href="{{ route('attribute.edit', [$attribute->id]) }}" class="badge bg-warning float-right">{{ __('app.edit') }}</a>    
                                
                                <a href="{{ route('attribute_type.create', [$attribute->id]) }}" class="badge float-right">{{ __('app.attributes.add') }}</a>
                                
                            
                            </li>
                            
                        @empty 
                            <li class="list-group-item">{{ __('app.empty') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection