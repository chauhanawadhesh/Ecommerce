@extends('layouts.main')
@section('main-section')
<div class="container ">
    <div class="row mt-5 justify-content-center">
        <div class="col-5">
            <h2 class="text-center bg-secondary p-2 rounded">Detail</h2>
            <table class="table table-striped-columns">
                <tr>
                    <th>Price</th>
                    <td>{{$total}}</td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td>0</td>
                </tr>
                <tr>
                    <th>Delivery</th>
                    <td>100</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{$total+100}}</td>
                </tr>
            </table>
            <form action="orderPlace" method='post'>
                @csrf
                <div class=" row form-group">
                    <textarea name="address" id="" cols="25" rows="2" class="form-control" placeholder="Please Fill Your Address" required></textarea>
                </div>
                <div class="row form-group " >
                    <label for="" class='p-1 fw-bold'>Peyment Method</label><br>
                    <input  type="radio" class='form-check-input' value="Online" name='payment'><span class='p-1'>Online</span>
                    <input  type="radio" class='form-check-input' value="emi" name='payment'><span class='p-1'>EMI</span>
                    <input  type="radio" class='form-check-input' value="cash on delivery" name='payment'><span class='p-1'>Cash On Delivery</span>
                </div>
                <div class="row p-3">
                    <button type='submit' class="btn btn-success">Order Now</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
