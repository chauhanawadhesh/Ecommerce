<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function loginIndex()
    {
        $url = '/loginuser';
        $title = 'User Login';
        return view('login',['url'=>$url,'title'=>$title]);
    }


    public function login(Request $request)
    {
        $request->validate
        ([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        $user = user::select()->where('email',$request->email)->where('password',$request->password)->get();
        if($user->all())
        {
            session(['email'=>$request->email]);
            // session(['name'=>$user->name]);
            // session(['name' => $request->name,'id' => $request->id,'email' => $request->email]);
            return redirect('/');
        }
        else
        {
            $url = '/loginuser';
            $title = 'User Login';
            $message =  Session::flash('message', 'Unauthorize User');
            return view('/login',['url'=>$url,'title'=>$title,'message' => $message]);
        }

    }
    public function logout()
    {
        session()->forget('email');
        return redirect('/login');
    }

    public function register()
    {
        $title = 'User Registration';
        $url = "/save_user";
        return view('register',['url'=>$url,'title'=>$title]);
    }

    public function save_user(Request $request)
    {
        $request->validate(
                        [
                            'name' => 'required',
                            'email' =>'required|email',
                            'password' => 'required|confirmed',
                            'password_confirmation'=>'required',
                        ]
            );

        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('login',[]);
    }
}
