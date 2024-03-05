<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Cart;
use App\User;
use Session;
use Auth;

class Cart extends Model
{
    public static function cartcount()
    {
    	if (Auth::check())
    	{
    		$cartcount = Cart::where('user_email', Auth::User()->email)->sum('product_qty');
    	}
    	else
    	{
    		$cartcount = Cart::where('session_id', Session::get('session_id'))->sum('product_qty');
    	}

    	return $cartcount;
    }
}
