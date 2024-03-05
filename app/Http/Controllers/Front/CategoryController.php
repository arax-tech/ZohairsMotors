<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoryController extends Controller
{
    public function index($url)
    {

    	$countCategory = Category::where(['name' => $url])->count();
    	if ($countCategory==0)
    	{
    		abort(404);
    	}
        
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        $categoriesDetails = Category::where(['name' => $url])->first();
        //dd($categoriesDetails->id);
        
        $products = Product::where(['cat_id' => $categoriesDetails->id])->paginate(6);
    

       
    	return view('categories', compact('products','categories','categoriesDetails'));
    }

    
}
