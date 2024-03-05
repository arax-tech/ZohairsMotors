<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductAttribute;
use App\OrderProduct;
use App\Category;
use App\Order;
use App\User;
use Session;
use Auth;

class OrderController extends Controller
{
    public function user_orders()
    {
    	$orders = Order::with('orders')->where('user_id', Auth::User()->id)->get();
		$categories = Category::with('categories')->where(['parent_id' => 0])->get();
		//dd($orders);
    	//$orders = json_decode(json_encode($orders));
    	//echo "<pre>"; print_r($orders); die();

    	return view('order.user-orders', compact('orders','categories'));
    }


    public function order_details($id)
    {
        $order_details = Order::with('orders')->where(['id' => $id,'user_id' => Auth::User()->id])->first();
       
        foreach ($order_details->orders as $key => $value)
        {

            $product_image = ProductAttribute::where(['product_id' => $value->product_id, 'color' => $value->product_color])->first();
            //dd($product_image->image);
            $order_details->orders[$key]->product_image = $product_image->image;
        }
     


        //$order_details = json_decode(json_encode($order_details));
        //echo "<pre>"; print_r($order_details); die;

        return view('order.order-details', compact('order_details'));
    
    }


    public function delete($id)
    {
    	$delete = Order::find($id)->delete();
    	return redirect()->back()->with('flash_message_success','Order Delete Successfully');
    }

    public function paypal()
    {
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        return view ('order.paypal', compact('categories'));
    }
}
