<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\User;
use Auth;

class PagesController extends Controller
{
    public function index()
    {
    	$pages = Page::all();
    	$users = User::where('id', Auth::User()->id)->first();
    	return view('admin.pages.index', compact('users','pages'));
    }

    public function create()
    {
    	$users = User::where('id', Auth::User()->id)->first();
    	return view('admin.pages.create', compact('users'));
    }

    public function store(Request $request)
    {
    	//dd($request->all());

    	$pages = New Page();
    	$pages->title = $request->title;
    	$pages->description	= $request->desc;
    	$pages->url = $request->url;
    	$pages->status = $request->status;
    	$pages->save();

    	if ($pages == TRUE)
    	{
    		return redirect('admin/pages')->with('flash_message_success','Page Added Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}
    }


    public function edit($id)
    {
    	$users = User::where('id', Auth::User()->id)->first();
    	$pages = Page::find($id);
    	return view('admin.pages.update', compact('users','pages'));
    }


    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$pages = Page::find($id);
    	$pages->title = $request->title;
    	$pages->description	= $request->desc;
    	$pages->url = $request->url;
    	$pages->status = $request->status;
    	$pages->update();

    	if ($pages == TRUE)
    	{
    		return redirect('admin/pages')->with('flash_message_success','Page Update Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}

    }

    public function delete($id)
    {
    	$delete = Page::find($id)->delete();
    		return redirect()->back()->with('flash_message_success','Page Delete Success...');
    }
}
