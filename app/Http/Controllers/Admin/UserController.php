<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::where('id', Auth::user()->id)->first();
    	$user = User::where('role','0')->get();
    	return view('admin.users.index', compact('user', 'users'));
    }

    public function delete($id)
    {
    	$delete = User::find($id)->delete();
    	return redirect()->back()->with('flash_message_success','User Delete Success');
    }
}
