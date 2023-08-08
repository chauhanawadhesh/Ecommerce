@extends('layouts.main')
@section('main-section')
<style>
  .trending-item
  {
    float:left;
    width:16.6%;
  }
</style>
<div id="carouselExampleControls" class="carousel slide mt-3" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($slider as $item)
    <div class="carousel-item {{$item->id==1?'active':''}}" >
      <img class="d-block w-100" src="{{$item->gallery}}" alt="" style="height:200px">
      {{-- <!-- <div class="carousel-caption">
          <h5 >{{$item->name}}</h5>
          <p>{{$item->description}}</p>
          </div> --> --}}
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>
<div class="container mt-4">
    <div class="list-group">
        <a class="list-group-item list-group-item-action text-center bg-secondary"><b>Trending Products</b></a>
      </div>
      <div id="carouselExampleControls" class=" row carousel slide mt-4" data-ride="carousel">
    <div class="col">
      @foreach($trend as $trend_item)
      <div class=" mt-3 trending-item text-center" >
        <a href="detail/{{$trend_item->id}}" style="text-decoration:none">
            <img class="trending-image" src="{{$trend_item->gallery}}" alt="" style="height:100px;width:100px;" >
            <h5 >{{$trend_item->category}}</h5>
        </a>
            {{-- <p>{{$item->description}}</p> --}}
      </div>
      @endforeach
      <hr>
    </div>
  </div>
</div>
@endsection
