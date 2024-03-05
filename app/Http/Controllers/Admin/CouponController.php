<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use App\User;
use Auth;
class CouponController extends Controller
{
    public function index()
    {
    	$users = User::where('id', Auth()->user()->id)->first();
    	$coupons = Coupon::all();
    	return view('admin.coupon.index', compact('users','coupons'));
    }


    public function create()
    {
    	$users = User::where('id', Auth()->user()->id)->first();
    	return view('admin.coupon.create', compact('users'));
    }


    public function store(Request $request)
    {
    	//dd($request->all());
    	$coupons = New Coupon();
    	$coupons->coupon_code = $request->coupon_name;
    	$coupons->amount = $request->coupon_amount;
    	$coupons->amount_type = $request->coupon_type;
    	$coupons->expiry_date = $request->coupon_expiry_date;
    	$coupons->status = $request->coupon_status;


    	$save = $coupons->save();
    	if ($save==true)
    	{
    		return redirect('admin/coupon')->with('flash_message_success','Coupon Added Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}
    }

    public function edit($id)
    {
    	$users = User::where('id', Auth()->user()->id)->first();
    	$coupons = Coupon::find($id);
    	return view('admin.coupon.update', compact('users','coupons'));
    }

    public function update(Request $request, $id)
    {
    	$coupons = Coupon::find($id);
    	$coupons->coupon_code = $request->coupon_name;
    	$coupons->amount = $request->coupon_amount;
    	$coupons->amount_type = $request->coupon_type;
    	$coupons->expiry_date = $request->coupon_expiry_date;
    	$coupons->status = $request->coupon_status;


    	$update = $coupons->update();
    	if ($update==true)
    	{
    		return redirect('admin/coupon')->with('flash_message_success','Coupon Updated Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}
    }

    public function delete($id)
    {
    	$delete = Coupon::find($id)->delete();
    	return redirect()->back()->with('flash_message_success','Coupon Deleted Success');

    }
}
