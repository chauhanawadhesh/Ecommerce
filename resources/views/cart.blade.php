@extends('layouts.main')
@section('main-section')
<div class="list-group">
    <a class="list-group-item list-group-item-action text-center bg-secondary"><b>{{session()->get('name');}} Cart Item</b></a>
  </div>
<div class=" container justify-content-center">
        @foreach($cart as $trend_item)
            <div class="row mt-4 text-">
                <div class="col-4">
                    <a href="detail/{{$trend_item->id}}" style="text-decoration:none">
                    <img class="trending-image" src="{{$trend_item->gallery}}" alt="" style="height:200px;width:290px;" >
                </a>
                </div>
                <div class="col-6">
                    <a href="detail/{{$trend_item->id}}" style="text-decoration:none">
                    <h5>{{$trend_item->name}}</h5>
                    <p class="text-dark">{{$trend_item->description}}</p>
                    <h5 class="text-dark" >{{$trend_item->category}}</h5>
                    </a>
                    <h4>Price : {{$trend_item->price}}</h4>
                </div>
                <div class="col-2 align-item-center">
                    <a href="/removeCart/{{$trend_item->cart_id}}" class="btn btn-warning">Remove From Cart</a>
                    {{-- <a href="/removeCart/{{$trend_item->id}}" class="btn btn-warning">Remove From Cart</a> --}}
                </div>
                <hr>
            </div>
        @endforeach
        @if($cart->all())
        <div class="row">
            <a href="/orderNow" class="btn btn-success btn-sm">Order Now</a>
        </div>
        @endif
</div>
@endsection
