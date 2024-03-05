<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\ProductAttribute;
use App\Product;
use App\User;
use Auth;
class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::with('orders')->orderBy('id', 'DESC')->get();
    	//$orders = json_decode(json_encode($orders));
    	//echo "<pre>"; print_r($orders); die();
    	$users = User::where('id', Auth::User()->id)->first();
    	return view('admin.order.index', compact('orders', 'users'));
    }

    public function order_details($id)
    {
    	$orders = Order::with('orders')->where('id', $id)->first();
    	foreach ($orders->orders as $key => $value)
    	{

    	    $product_image = ProductAttribute::where(['product_id' => $value->product_id, 'color' => $value->product_color])->first();
    	    //dd($product_image->image);
    	    $orders->orders[$key]->product_image = $product_image->image;
    	}
    	//$orders = json_decode(json_encode($orders));
    	//echo "<pre>"; print_r($orders); die();
    	$users = User::where('id', Auth::User()->id)->first();
    	return view('admin.order.order-details', compact('orders', 'users'));
    }


    public function invoice($id)
    {
        $orders = Order::with('orders')->where('id', $id)->first();
        foreach ($orders->orders as $key => $value)
        {

            $product_image = ProductAttribute::where(['product_id' => $value->product_id, 'color' => $value->product_color])->first();
            //dd($product_image->image);
            $orders->orders[$key]->product_image = $product_image->image;
        }
        //$orders = json_decode(json_encode($orders));
        //echo "<pre>"; print_r($orders); die();
        $users = User::where('id', Auth::User()->id)->first();
        return view('admin.order.invoice', compact('orders', 'users'));
    }


    public function edit($id)
    {
    	$orders = Order::find($id);
    	//$orders = json_decode(json_encode($orders));
    	//echo "<pre>"; print_r($orders); die();
    	$users = User::where('id', Auth::User()->id)->first();
    	return view('admin.order.update', compact('orders', 'users'));
    }

    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$order = Order::find($id);
    	$order->order_status = $request->status;
    	$order->update();
    	if ($order==true)
    	{
    		return redirect('admin/orders')->with('flash_message_success','Order Status Update');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}
    }
}
