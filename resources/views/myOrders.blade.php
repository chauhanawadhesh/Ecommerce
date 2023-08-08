@extends('layouts.main')
@section('main-section')
<div class="list-group">
    <a class="list-group-item list-group-item-action text-center bg-secondary"><b>My Orders</b></a>
  </div>
<div class="container">
    <div class="rw">
        <div class="col">
            @foreach($orders as $order)
                <div class="row mt-4 text-">
                    <div class="col-4">
                        <a href="detail/{{$order->id}}" style="text-decoration:none">
                        <img class="trending-image" src="{{$order->gallery}}" alt="" style="height:200px;width:290px;" >
                    </a>
                    </div>
                    <div class="col-6">
                        <a href="detail/{{$order->id}}" style="text-decoration:none">
                        <h5>{{$order->name}}</h5>
                        <p class="text-dark">{{$order->description}}</p>
                        <h5 class="text-dark" >{{$order->category}}</h5>
                        </a>
                        <h4>Price : {{$order->price}}</h4>
                    </div>
                    <div class="col-2 align-item-center">
                        {{-- <a href="/removeCart/{{$order->cart_id}}" class="btn btn-warning">Remove From Cart</a> --}}
                        {{-- <a href="/removeCart/{{$trend_item->id}}" class="btn btn-warning">Remove From Cart</a> --}}
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
