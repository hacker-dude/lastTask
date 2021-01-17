@extends('layouts.app')

@section('content')

@foreach($products as $product)
<div class="card" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title"><a href="{{ route('seeProduct', ["id"=>$product->id]) }}" title="">{{$product->name}}</a></h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">{{$product->price}}</a>
  </div>
</div>
@endforeach
@endsection
