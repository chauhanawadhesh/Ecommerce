@extends('layouts.main')
@section('main-section')
<div class="list-group">
    <a class="list-group-item list-group-item-action text-center bg-secondary"><b>Result For Searching</b></a>
  </div>
<div class=" container justify-content-center">
    @foreach($search as $trend_item)
    <div class="row mt-4 text-">
        <div class="col-6">
            <a href="detail/{{$trend_item->id}}" style="text-decoration:none">
            <img class="trending-image" src="{{$trend_item->gallery}}" alt="" style="height:250px;width:400px;" >
        </a>
        </div>
        <div class="col-6">
            <a href="detail/{{$trend_item->id}}" style="text-decoration:none">
            <h3>{{$trend_item->name}}</h3>
            <p class="text-dark">{{$trend_item->description}}</p>
            <h5 class="text-dark" >{{$trend_item->category}}</h5>
            </a>
            <h3>Price : {{$trend_item->price}}</h3>
        </div>
    </div>
    @endforeach
</div>
@endsection




{{-- <div class="trending-item text-center" >





</div> --}}

