<!DOCTYPE html>
<?php
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
$orders = ProductController::sellerOrders();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('jquery.js') }}"></script> --}}
    <script>
        $(document).ready(function(){
            $(".loader").fadeOut("slow");
        })
    </script>
    <style>
        .loader{
            position:fixed;
            left:0px;
            top:0px;
            width:100%;
            height:100%;
            z-index:9999;
            background:@yield(url("load.gif"));

        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E Com</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link " href="/">Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/">Products</a>
        </li>
        @if(session()->has('seller'))
        <li class="nav-item">
            <a class="nav-link" href="/addProduct">Add Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logoutSeller">Logout Seller  <b class="text-danger">{{session()->get('seller')}}</b></a>
        </li>
        @endif
          @if(session()->has('email'))
        <li class="nav-item">
            <a class="nav-link" href="/myOrder">My Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Logout :{{ Session::get('email');}}</a>
        </li>
        @endif
        @if(!session()->has('email') && !session()->has('seller'))
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
        </li>
        @endif
      </ul>
      <form class="d-flex" action="/search" method="post">
        @csrf
        <input class="form-control me-sm-2" name="search" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      @if(session()->has('email'))
      <a type="button" class="btn btn-danger mx-4" href="/cartlist">
        Cart <span class="badge badge-primary">{{$total}}</span>
      </a>
      @endif
      @if(session()->has('seller'))
      <a type="button" class="btn btn-success mx-4" href="/ordersforsale">
        Orders <span class="badge badge-primary">{{$orders}}</span>
      </a>
      @endif
      {{-- <ul class="navbar-nav">
        <li class="nav-link" >Cart</li>
      </ul> --}}
    </div>
  </div>
</nav>
