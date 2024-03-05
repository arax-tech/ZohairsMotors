<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ProductAttribute;
use App\Product;
use App\Category;
use App\Coupon;
use App\Cart;
use App\User;
use Session;
use Auth;
use DB;
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	//dd($request->all());


        Session::forget('CouponAmount');
        Session::forget('CouponCode');


        $postal_code = DB::table('postal_codes')->where('code', $request->postal_code)->count();
        if ($postal_code == 0)
        {
            return redirect()->back()->with('flash_message_error','Sorry Shipping is Not Available in Your City..');
        }
           



        $stock = ProductAttribute::where('id', $request->attrib_id)->first();
        //dd($stock->stock);
        if ($stock->stock < $request->pro_qty)
        {
            return redirect()->back()->with('flash_message_error','Required Product Quantity is Not Available...');
        }


       

    	$carts = New Cart();
        $carts->product_id = $request->product_id;
    	$carts->attrib_id = $request->attrib_id;

    	$sizeArray = explode('-',$request->size);
    	$carts->product_size = $sizeArray[1];

    	$colorArray = explode('-',$request->color);
    	$carts->product_color = $colorArray[1];

    	$carts->product_prize = $request->pro_prize;
    	$carts->product_qty = $request->pro_qty;
    	
        if ($request->user_email == "")
        {
            $carts->user_email = "";
        }
        else
        {
        	$carts->user_email = $request->user_email;
        }


        $session_id = Session::get('session_id');
        if (empty($session_id))
        {
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
        }
        //$ip =  $request->ip();
        $carts->session_id = $session_id;


        /*Validate Cart*/
         $countCart = Cart::where(['product_id' => $request->product_id, 'product_size' => $sizeArray[1], 'product_color' => $colorArray[1], 'session_id' => $session_id])->count();
         if ($countCart>0)
         {
            return redirect()->back()->with('flash_message_error','Product is Already Added in Your Cart...');
         }
         else
         {
    	   $carts->save();
         }


    	return redirect('cart')->with('flash_message_success','Product is Added in Cart');
    }

    public function cart()
    {

        $session_id = Session::get('session_id');
        $users = (Auth::check()) ? User::where('id', Auth::user()->id)->first() : false;

        if (Auth::check())
        {
            $cart_item = Cart::where(['user_email' => $users->email])->orWhere(['session_id' => $session_id])->get();
        }
        else
        {
            $cart_item = Cart::where(['session_id' => $session_id])->get();
        }
       

        /*Get Products Attributes Stock*/
        foreach ($cart_item as $key => $value)
        {
            $stock = ProductAttribute::where('id', $value->attrib_id)->first();
            //dd($attrib_id);
            $cart_item[$key]->stock = $stock->stock;
        }
        /*Get Products Name*/
        foreach ($cart_item as $key => $value)
        {
            $product_name = Product::where('id', $value->product_id)->first();
            //dd($product_name);
            $cart_item[$key]->product_name = $product_name->pro_name;
        }
        /*Get Products Image*/
        foreach ($cart_item as $key => $value)
        {

            $product_image = ProductAttribute::where(['product_id' => $value->product_id, 'color' => $value->product_color])->first();
            $cart_item[$key]->product_image = $product_image->image;
        }
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        //$cart_item = json_decode(json_encode($cart_item));
        //echo "<pre>";print_r($cart_item); die();
        return view('cart', compact('categories','cart_item'));
    }


    public function update($id, $qty)
    {
        /*Manage Stock*/
        Session::forget('CouponAmount');
        Session::forget('CouponCode');



        $GetCart = Cart::find($id);
        $GetAttribStock = ProductAttribute::where('id', $GetCart->attrib_id)->first();
        $updated_Qty = $GetCart->product_qty+$qty;
        if ($GetAttribStock->stock >= $updated_Qty)
        {
            $cart_update = Cart::where('id',$id)->increment('product_qty', $qty);
        }
        else
        {
            return redirect()->back()->with('flash_message_error','Required Product Quantity Is Not Available');
            
        }
        //$GetCart = json_decode(json_encode($GetCart));
        //echo "<pre>";print_r($GetCart); die();

        return redirect()->back()->with('flash_message_success','Cart Item Updated Success');
    }

    public function delete($id)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        
        $delete = Cart::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Cart Items Deleted Success');
    }



    public function apply_coupon(Request $request)
    {
        //dd($request->all());

        Session::forget('CouponAmount');
        Session::forget('CouponCode');


        $CouponCount = Coupon::where('coupon_code', $request->coupon_code)->count();
        /*Coupon Count*/
        if ($CouponCount==0)
        {
            return redirect()->back()->with('flash_message_error','Please Enter a Valid Coupon Code');
            
            
        }
        else
        {
            /*Coupon Details*/
            $CouponDetails = Coupon::where('coupon_code', $request->coupon_code)->first();
            
            /*Check Coupon is Active Or Not :( */
            if ($CouponDetails->status=="Drafted")
            {
                return redirect()->back()->with('flash_message_error','This Coupon Code Is Not Active...');
            }

            /*Check Coupon Is Expied Or Not :) */
            $ExpiryDate = $CouponDetails->expiry_date;
            $CurrentDate = date('Y-m-d');

            if ($ExpiryDate < $CurrentDate)
            {
                return redirect()->back()->with('flash_message_error','This Coupon Code Is Expired...');
            }

            /*Get Total Amount*/
            $session_id = Session::get('session_id');
            if (Auth::check())
            {
                $cart_item = Cart::where(['user_email' => Auth::user()->email])->get();
            }
            else
            {
                $cart_item = Cart::where(['session_id' => $session_id])->get();
            }
            $total_amount = 0;

            /*Get Products Attributes Stock*/
            foreach ($cart_item as $item)
            {
                
                $total_amount = $total_amount + ($item->product_prize * $item->product_qty);
            }
            /*Check if Amount Type if Fixed OR Percentage*/
            if ($CouponDetails->amount_type == "Fixed")
            {
                $CouponAmount = $CouponDetails->amount;
            }
            else
            {
                $CouponAmount = $total_amount * ($CouponDetails->amount/100);
            }

            /*Add Coupon Code & Amount into Session*/
            Session::put('CouponAmount', $CouponAmount);
            Session::put('CouponCode', $request->coupon_code);

            return redirect()->back()->with('flash_message_success','You Are Availe Discount');

        }
    }
}
