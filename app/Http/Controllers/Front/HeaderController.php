<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class HeaderController extends Controller
{
    public function index($url)
    {
        $cates = Category::with('categories')->where(['parent_id' => 0])->get();
        dd($cates);
    	return view('categories', compact('cates'));
    }
}
