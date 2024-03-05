<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProductAttribute;
use App\OrderProduct;
use App\Category;
use App\Product;
use App\Order;
use App\User;
use App\Cart;
use Session;
use Auth;
class CheckoutController extends Controller
{
    public function checkout()
    {
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $users = User::where('id', Auth::user()->id)->first();


        $session_id = Session::get('session_id');
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



    	return view('user.checkout', compact('categories','users','cart_item'));
    }

    public function place_order(Request $request)
    {
        //dd($request->all());
        $order = New Order();

        $order->user_id = $request->user_id;
        $order->user_name = $request->user_name;
        $order->user_email = $request->user_email;
        $order->user_city = $request->user_city;
        $order->user_state = $request->user_state;
        $order->user_address = $request->user_address;
        $order->user_zip = $request->user_zip;
        $order->user_phone = $request->user_phone;
        $order->user_mobile = $request->user_mobile;
        $order->user_alternative_mobile = $request->user_alt_mob;
        $order->coupon_amount = $request->coupon_amount;
        $order->shipping_charges = $request->shipping_charges;
        $order->grand_total = $request->grand_total;
        $order->payment_method = $request->payment;
        $order->order_status = "In Progress";
       
        $order->save();
        
        $order_id = DB::getPdo()->lastInsertId();
        //dd($order_id);

        $session_id = Session::get('session_id');
        $cart_products = Cart::where(['session_id' => $session_id])->orWhere(['user_email' => Auth::user()->email])->get();
        //dd($cart_products);
        //dd($user_id = Auth::user()->id);


        foreach ($cart_products as $OrderProduct)
        {
            $CartPro = New OrderProduct();
            $CartPro->order_id = $order_id;    
            $CartPro->user_id = Auth::user()->id;  
            $CartPro->product_id = $OrderProduct->product_id;  
            $CartPro->attrib_id = $OrderProduct->attrib_id;    

            foreach ($cart_products as $key => $value)
            {
                $product_name = Product::where('id', $value->product_id)->first();
                $cart_products[$key]->product_name = $product_name->pro_name;
            }


            $CartPro->product_name = $OrderProduct->product_name;  
            $CartPro->product_color = $OrderProduct->product_color;    
            $CartPro->product_size = $OrderProduct->product_size;  
            $CartPro->product_prize = $OrderProduct->product_prize;    
            $CartPro->product_qty = $OrderProduct->product_qty;    
            $CartPro->save();

        }
            Session::put('order_id', $order_id);
            Session::put('grand_total', $request->grand_total);


            if ($request->payment == "Cashe On Delivery")
            {
                return redirect('/thanks')->with('flash_message_success','Your Order Placed Success');
            }
            else
            {
                return redirect('/paypal')->with('flash_message_success','Your Order Placed Success');
            }
            
        
    	
    }

    public function thanks()
    {
        $session_id = Session::get('session_id');
        $detete = Cart::where(['session_id' => $session_id])->orWhere(['user_email' => Auth::user()->email])->delete();

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        return view('order.thanks', compact('categories'));
    }
}


