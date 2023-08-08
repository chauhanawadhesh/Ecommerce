@extends('layouts.main')
@section('main-section')

<div class="container">
<h3 class="text-center mt-3">{{$title}}</h3>
    <form action="{{$url}}" method="post">
        @csrf
        <div class="row mt-4 justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                @if(session()->has("message"))
                <div class="alert alert-danger text-center text-denger">
                    {{session()->get("message")}}
                </div>
                @endif
                <label for="email">Email</label>
                <input type="email" class='form-control' name='email' placeholder="Enter Email">
                <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <label for="email">Password</label>
                <input type="password" class='form-control' name='password' placeholder="Enter Password">
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-sm-4 col-sm-offset-4">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="/selerLogin" style="text-decoration: none">Seller Login?</a>

            </div>
        </div>
    </form>
</div>
@endsection
