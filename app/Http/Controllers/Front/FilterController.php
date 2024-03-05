<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ProductAttribute;
use App\Category;
use App\Product;
use DB;

class FilterController extends Controller
{
    public function filters(Request $request)
    {
    	//dd($request->all());
    	$filter = DB::SELECT('
    	    SELECT * FROM product_attributes 
    	    INNER JOIN products
    	    on product_attributes.product_id = products.id
    	    WHERE product_attributes.color = '.$request->filter.' 
    	');

    	//dd($filter);
    
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
    	return view('filter', compact('filter','categories'));

    	
    }
}
