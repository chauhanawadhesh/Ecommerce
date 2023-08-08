<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\seller;
use App\Http\Controllers\ProductController;

class sellerController extends Controller
{
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
            return redirect('/addProduct');
        }
        else
        {
            echo "UnAuthorize User";
        }

    }
    // public function product()
    // {
    //     return view('product');
    // }
}
