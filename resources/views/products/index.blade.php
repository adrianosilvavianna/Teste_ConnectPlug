@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('app.products.all') }}
                    <a href="{{ route('product.create') }}" class="badge float-right">{{ __('app.create') }}</a>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        @forelse   ($products as $product)
                            <li class="list-group-item">{{ $product->name }}
                            
                                <a href="{{ route('product.edit', [$product->id]) }}" class="badge bg-warning float-right">{{ __('app.edit') }}</a>    
                                <span class="badge bg-success float-right">{{ __('app.inventory') }}</span>
                                
                            
                            </li>
                            
                        @empty 
                            <li class="list-group-item">{{ __('app.products.empty') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection