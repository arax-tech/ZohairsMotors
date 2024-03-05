<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class ContactController extends Controller
{
    public function index()
    {
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
    	return view('pages.contact', compact('categories'));
    }

    public function contact(Request $request)
    {
    	return redirect()->back()->with('flash_message_success','Thanks For Conatct Wel Wil Get In Touch');
    }
}