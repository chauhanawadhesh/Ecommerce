@extends('layouts.main')
@section('main-section')
<div class="container">
    @foreach($detail as $item)
    <div class="row mt-4">
        <div class="col-6">
            <img src="{{$item->gallery}}" alt="" style="height:300px;width:500px;">
        </div>
        <div class="col-6">
            <a style="text-decoration:none" href=""><h3>{{$item->name}}</h3></a>
            <p><h4>Dscription : </h4>{{$item->description}}</p>
            <h6>Category : {{$item->category}}</h6>
            <h3>Price : {{$item->price}}</h3>
            <br>
            <form action="/addToCart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$item->id}}">
                <button class="btn btn-success">Add To Cart</button>
            </form><br>
            <form action="/buyNow" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$item->id}}">
                <button   class="btn btn-primary">Buy Now</button>
            </form><br>
        </div>
    </div>
    @endforeach
</div>
@endsection
