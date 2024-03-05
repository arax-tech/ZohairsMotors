<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
    		//dd($request->all());
    		if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => '1']))
    		{
    			return redirect('admin/dashboard');
    		}
    		else
    		{
    			return redirect()->back()->with('flash_message_error','Invalid Email Or Password...!');
    		}
    	}
    	return view('admin.login');
    }


    public function dashboard()
    {
        $users = User::where(['id' => Auth::user()->id])->first();
    	return view('admin.dashboard', compact('users'));
    }


    public function change_password()
    {
        $users = User::where(['id' => Auth::user()->id])->first();
        return view('admin.change_password', compact('users'));
    }

    public function check(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_password'];
        $check_password = User::where(['role' => 1])->first();
        if (Hash::check($current_password, $check_password->password))
        {
            echo "<p style='color: green'>Grate! Current Password is Correct...</p>";
        }
        else
        {
            echo "<p style='color: rgba(244, 12, 67);'> Oopss! Current Password is Incorrect...</p>";
        }
    }

    public function update_password(Request $request)
    {
        //dd($request->all());
        if (!(Hash::check($request->get('current_password'),Auth::user()->password)))
        {
            return redirect()->back()->with('flash_message_error','Current Password is Incorrect...');
        }

        if (strcmp($request->get('current_password'), $request->get('new_password'))==0)
        {
            return redirect()->back()->with('flash_message_error','Your New Password Can not be Same...');
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect()->back()->with('flash_message_success','Password Update Success');

    }

    public function profile()
    {
        $users = User::where(['id' => Auth::user()->id])->first();
        return view('admin.profile', compact('users'));
    }

    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $update = $user->update();
        if ($update==true)
        {
            return redirect()->back()->with('flash_message_success','Profile Update Successfully');
        }
        else
        {
             return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
        }
    }


    public function update(Request $request, $id)
    {
        /*dd($request->all());*/
        $data = User::find($id);
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('back_end/users/profile/',$filename);
            $data->img = $filename;
        }
        else
        {
            return $request;
            $data->img = '';

        }

        $update = $data->update();
        if ($update)
        {
            return response()->json(['status'=>  true , 'file'=>  url('back_end/users/profile/'.$filename) ]);
        }
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('/admin/login')->with('flash_message_success','Logout Successfully...');
    }
}
