<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\Category;
use App\User;
use Auth;

class PagesController extends Controller
{
    public function index($url)
    {
        error_reporting(0);
    	$count = Page::where(['url' => $url, 'status' => 'Published'])->count();

    	if ($count>0)
    	{
    		$pages = Page::where('url', $url)->first();
    	}
    	else
    	{
    		abort(404);
    	}


    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
    	$users = User::where('id', Auth::User()->id)->first();

    	// $pages = json_decode(json_encode($pages));
    	// echo "<pre>"; print_r($pages); die();
    	return view('pages.index', compact('users','pages', 'categories'));
    }
}