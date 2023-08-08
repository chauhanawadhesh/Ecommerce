@extends('layouts.main')
@section('main-section')
<div class="container">
    <form action="/saveProduct" method="post">
        @csrf
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <label for="">Product Name</label>
                <input type="text" name="productName" class="form-control" placeholder="Enter Product Name">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <label for="">Product Price</label>
                <input type="text" name="productPrice" class="form-control" placeholder="Enter Product Price">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <label for="">Product Category</label>
                <input type="text" name="productCat" class="form-control" placeholder="Enter Product Category">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <label for="">Product Image Path</label>
                <input type="text" name="productImg" class="form-control" placeholder="Enter Product Image Path">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <label for="">Product description</label>
                <input type="text" name="productDes" class="form-control" placeholder="Enter Product Description">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-6">
                <button type="submit" class="btn btn-success">Add</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
@endsection
