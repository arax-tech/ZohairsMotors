<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use Auth;
use Hash;
class AccountController extends Controller
{
    public function account()
    {
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $users = User::where('id', Auth::user()->id)->first();
    	return view('user.account', compact('categories','users'));
    }

    public function update_password(Request $request)
    {
    	//dd($request->all());
    	$current_pwd = $request->current_pwd;
    	$check_password = User::where('id', Auth::user()->id)->first();
    	if (Hash::check($current_pwd, $check_password->password))
    	{
    		$user = Auth::user();
    		$user->password = bcrypt($request->new_pwd);
    		$user->save();
    		return redirect()->back()->with('flash_message_success','Password Update Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Current Password is Incorrect...');
    	}


    }

    public function check_pwd(Request $request)
    {	
    	//dd($request->all());

        $current_pwd = $request->current_pwd;
        $check_password = User::where('id', Auth::user()->id)->first();
        if (Hash::check($current_pwd, $check_password->password))
        {
            echo "<p style=' font-size:16px; color: green'>Current Password is Correct...</p>";
        }
        else
        {
            echo "<p style=' font-size:16px; color: rgba(244, 12, 67);'> Current Password is Incorrect...</p>";
        }
    }


    public function update_info(Request $request, $id)
    {
    	//dd($request->all());
    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->phone = $request->phone;
    	$user->mobile = $request->mob_number;
    	$user->alternative_mobile = $request->alt_mob;
    	$user->city = $request->city;
    	$user->state = $request->state;
    	$user->address = $request->address;
    	$user->zip = $request->zip_postal;
    	$user->note = $request->note;

    	$user->update();
    	return redirect()->back()->with('flash_message_success','Account Update Successfully');
    }
}
