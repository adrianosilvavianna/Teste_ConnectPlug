@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.create') }}</div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <form method="POST" action="{{ route('inventory.store') }}">
                            @csrf
                            
                            <select class="form-select" aria-label="Default select example" name="product_id">
                                <option selected>{{ __('app.products.all') }}</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>

                            @foreach($attributes as $attribute)

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$attribute->id}}" id="{{$attribute->id}}" name="attribute_id[]">
                                    <label class="form-check-label" for="{{$attribute->id}}">
                                        {{$attribute->name}}
                                    </label>
                                    <br>
                                    @foreach($attribute->Types as $type)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="{{ $type->id }}" value="{{ $type->id }}" name="attribute_type_id[]">
                                            <label class="form-check-label" for="{{ $type->id }}">
                                                {{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                                
                            @endforeach


                              <div class="form-group">
                                <label for="name">{{ __('app.quantity') }}</label>
                                <input type="number" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.inventories.quantity') }}" name="quantity" >
                              </div>

                              <div class="form-group">
                                <label for="name">{{ __('app.unit_cost') }}</label>
                                <input type="number" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.inventories.unit_cost') }}" name="unit_cost" >
                              </div>

                              <div class="form-group">
                                <label for="name">{{ __('app.total_cost') }}</label>
                                <input type="number" class="form-control" id="name" aria-describedby="name" placeholder="{{ __('app.inventories.total_cost') }}" name="total_cost" >
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