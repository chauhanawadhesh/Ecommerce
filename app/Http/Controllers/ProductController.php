<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use App\Models\orde;
use App\Models\seller;
use Illuminate\Support\Facades\Session;



class ProductController extends Controller
{
    public function index()
    {
        $slider =  Product::select()->where('id','<=','5')->get();
        $trend =  Product::select()->where('id','>','5')->get();
        return view('product',['slider'=>$slider,'trend'=>$trend]);
    }


    public function detail($id)
    {
        $data = Product::select()->where('id',$id)->get();
        return view('detail',['detail'=>$data]);
    }

    public function search(Request $request)
    {

        if($request->input('search'))
        {
        $data = Product::where('category','LIKE','%'.$request->input('search').'%')->get();
        return view('search',['search'=>$data]);
        }else{
            return redirect('/');
        }
    }


    public function addToCart(Request $request)
    {
        if($request->session()->has('email'))
        {
            $cart = new cart;
            $cart->user_email = Session()->get('email');
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('cartlist');
        }
        else{
            return redirect('/login');
        }
    }


    static function cartItem()
    {
        $user_email = session()->get('email');
        $data = cart::where('user_email' , $user_email)->count();
        return $data;
    }

    public function cartlist()
    {
        $user_email = session()->get('email');
        $data = DB::table('cart')->join('products','cart.product_id','products.id')
                ->select('products.*','cart.id as cart_id')->where('cart.user_email',$user_email)->get();
                return view('cart',['cart'=>$data]);
    }

    public function deleteCart($id)
    {
        // $user_email=session()->get('email');
        $data =  cart::select()->where('id',$id,)->get();
        // $data =  cart::select()->where('product_id',$id,)->where('user_email',$user_email)->get();
        $data->each->delete();
        return redirect('cartlist');
    }

    public function orderNow()
    {
        $user_email = session()->get('email');
        $totalPrice  = DB::table('cart')->join('products','cart.product_id','products.id')->select('products.name','products.price')
        ->where('cart.user_email',$user_email)
        ->sum('products.price');
        return view('orderNow')->with('total',$totalPrice);
    }

    public function buyNow(Request $req)
    {
        if(session()->has('email'))
        {
            $total = DB::table('products')->where('id',$req->product_id)->sum('products.price');
            return view('orderNow')->with('total',$total);
        }
        else
        {
            return redirect('login')->with("message","You are Not logged in Please Login");
        }
    }

    public function orderPlace(Request $request)
    {
        $user_email = session()->get('email');
        $allCart = cart::where('user_email',$user_email)->get();
        foreach($allCart as $cart)
        {
            $order = new orde;
            $order->product_id = $cart->product_id;
            $order->user_email = $user_email;
            $order->address = $request->address;
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->save();
        }
        $data =  cart::select()->get();
        $data->each->delete();
        return redirect('myOrder');
    }

    public function myOrder()
    {
        $user_email = session()->get('email');
        $data = DB::table('ordes')->join('products','products.id','product_id')->select()->where('user_email',$user_email)->get();
        return view('myOrders',['orders'=>$data]);
    }


    //seller

    public function logoutSeller()
    {
        session()->forget('seller');
        return redirect('/login');
    }


    public function seller()
    {
        $title = 'Seller Registration';
        $url = '/save_seller';
        return view('register',['url'=>$url,'title'=>$title]);
    }

    public function selerLogin()
    {
        $url = 'login';
        $title = 'Seller Login';
        return view('login',['url'=>$url,'title'=>$title]);
    }

    public function save_seller(Request $request)
    {
        $request->validate(
                            [
                                'name' => 'required',
                                'email' =>'required|email',
                                'password' => 'required|confirmed',
                                'password_confirmation'=>'required',
                            ]
                         );

        $seller = new seller;
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = $request->password;
        $seller->save();
        return redirect('login');
    }


    public function login(Request $request)
    {
        $request->validate
        ([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        $seller = seller::select()->where('email',$request->email)->where('password',$request->password)->get();
        if($seller->all())
        {
            session(['seller'=>$request->email]);
            // session(['name'=>$user->name]);
            // session(['name' => $request->name,'id' => $request->id,'email' => $request->email]);
            // return redirect()->action(ProductController@index);
            return redirect('/');
        }
        else
        {
            $message =  Session::flash('message', 'Unauthorize Seller');
            $url = 'login';
            $title = 'Seller Login';
            return view('login',['url'=>$url,'title'=>$title,"message"=>$message]);
        }
    }

    public function addProduct()
    {
        return view("addProduct");
    }

    public function saveProduct(Request $request)
    {
        $request->validate(
            [
                'productName' => 'required',
                'productPrice' =>'required',
                'productCat' => 'required',
                'productImg' => 'required',
                'productDes' => 'required',
            ]
         );

                $product = new product;
                $product->name = $request->productName;
                $product->price = $request->productPrice;
                $product->category = $request->productCat;
                $product->gallery = $request->productImg;
                $product->description = $request->productDes;
                $product->seller = session()->get('seller');
                $product->save();
                return redirect('/');
    }

    static function sellerOrders()
    {
        if(session()->has('seller'))
        {
            $seller = session()->get('seller');
            $orders = DB::table('ordes')->join('products','products.id','product_id')
            ->select('seller')->where('products.seller',$seller)->count();
            return $orders;
        }
    }

    public function ordersforsale()
    {
        $seller = session()->get('seller');
        $orders = DB::table('ordes')->join('products','products.id','product_id')
        ->select()->where('products.seller',$seller)->get();
        return view('orderForSale',['order'=>$orders]);
        // echo "<pre>";
        // print_r($orders);
        // return $orders;
    }

}

