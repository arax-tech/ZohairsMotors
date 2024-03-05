<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
    	$users = User::where(['id' => Auth::user()->id])->first();
    	$categories = Category::orderBy('id','DESC')->get();
    	return view('admin.category.index', compact('users', 'categories'));
    }

    public function create()
    {
        $categories = Category::where(['parent_id' => 0])->get();
    	$users = User::where(['id' => Auth::user()->id])->first();
    	return view('admin.category.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	$category = New Category();

    	$category->name = $request->name;
    	$category->description = $request->description;
        $category->parent_id = $request->parent_id;
    	$category->status = $request->status;

    	$save = $category->save();
    	if ($save==true)
    	{
    		return redirect('admin/category')->with('flash_message_success','Category Added Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}
    }

    public function edit($id)
    {
    	$users = User::where(['id' => Auth::user()->id])->first();
    	$category = Category::find($id);

        
        //$category = json_decode(json_encode($category));
        //echo "<pre>"; print_r($category); die();
       
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_details = Category::where(['id' => $id])->first();
    	return view('admin.category.update', compact('users','category','categories','categories_details'));
    }

    public function update (Request $request, $id)
    {
    	//dd($request->all());
    	$category = Category::find($id);
    	$category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
    	$category->status = $request->status;

    	$save = $category->save();
    	if ($save==true)
    	{
    		return redirect('admin/category')->with('flash_message_success','Category Update Success');
    	}
    	else
    	{
    		return redirect()->back()->with('flash_message_error','Oopss, Somthing is Wrong Please Try Again...');
    	}
    }

    public function delete($id)
    {
    	$delete = Category::find($id)->delete();
    	return redirect()->back()->with('flash_message_success','Category Delete Success');
    }
}
