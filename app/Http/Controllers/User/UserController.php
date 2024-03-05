<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Cart;
use Session;
use Auth;

class UserController extends Controller
{
    public function login_register()
    {
    	/*GET ALL CATEGORIES AND SUB_CATEGORIES*/
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();

    	return view('user.login_register',compact('categories'));
    }


    public function store(Request $request)
    {
    	//dd($request->email());

    	/*Vlidate User*/
    	$user_count = User::where('email',$request->email)->count();
    	if ($user_count>0)
    	{
    		return redirect()->back()->with('flash_message_error','Email is Already Taken Please Use Another Email...');
    	}

    	$user = New User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->role = "0";
    	$user->password = Hash::make($request->password);

    	$user->save();


    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => "0"]))
    	{
            if (!(empty(Session::get('session_id'))))
            {
                $session_id = Session::get('session_id');
                $cart = Cart::where('session_id', $session_id)->update(['user_email' => $request->email]);
            }
    		return redirect('/cart');
    	}
    }


    public function check_email(Request $request)
    {
    	//dd($request->email());

    	/*Vlidate User*/
    	$current_email = $request->current_email;
    	$check_email = User::where('email', $current_email)->count();
    	if ($check_email>0)
    	{
    		echo "<p style='color: rgba(244, 12, 67);'> Oopss! Email is Already Exist...</p>";
    	}
    	else
    	{
    		echo "<p style='color: green'>Grate! Email is Correct...</p>";
    	}
    }


    public function login(Request $request)
    {
    	//dd($request->all());
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => "0"]))
    	{
            if (!(empty(Session::get('session_id'))))
            {
                $session_id = Session::get('session_id');
                $cart = Cart::where('session_id', $session_id)->update(['user_email' => $request->email]);
            }
    		return redirect('/cart');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Invalid Email & Password...');
    	}
    }


    public function logout()
    {
    	Auth::logout();
        Session::forget('session_id');
    	return redirect('/');
    }

    
}
