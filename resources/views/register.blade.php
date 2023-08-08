@extends('layouts.main')
@section('main-section')
<h3 class="text-center mt-3">{{$title}}</h3>
<div class="container">
    <form action="{{$url}}" method='post'>
        @csrf
        <div class="row mt-3 justify-content-center">
            <div class="col-4">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                <span class='text-danger'>
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-4">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                <span class='text-danger'>
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-4">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                <span class='text-danger'>
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-4">
                <label for="">Password Confirm</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password">
                <span class='text-danger'>
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-4">
                <button type="submit" class="btn btn-success">Register</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="/registersel" style="text-decoration: none">Register Seller ?</a>
            </div>
        </div>
    </form>
</div>


@endsection
