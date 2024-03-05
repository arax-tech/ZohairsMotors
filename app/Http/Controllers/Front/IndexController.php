<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductAttribute;
use App\Category;
use App\Product;
use App\Slider;
use App\User;
use Auth;
use DB;
class IndexController extends Controller
{
    public function index()
    {
    	/*GET ALL PRODUCTS | IN DESINDING ORDER | ADD PAGINATION */
    	$products = Product::where(['pro_future' => 'Future', 'pro_status' => 'Published'])->limit(6)->inRandomOrder()->get();
        $onsale = Product::where(['pro_future' => 'On Sale', 'pro_status' => 'Published'])->limit(6)->inRandomOrder()->get();
    	/*GET ALL CATEGORIES AND SUB_CATEGORIES*/
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();


        /*GET SLIDER*/
        $sliders = Slider::where('status', 'Published')->get();
        //$products = json_decode(json_encode($products));
        //echo "<pre>"; print_r($products);die();
    	return view('index', compact('products','categories','sliders','onsale'));
    }

    public function shop()
    {
        /*GET ALL PRODUCTS | IN DESINDING ORDER | ADD PAGINATION */
        $products = Product::orderBy('id', 'DESC')->paginate(9);

        /*GET ALL CATEGORIES AND SUB_CATEGORIES*/
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        //$categories = json_decode(json_encode($categories));
        //echo "<pre>"; print_r($categories);
        return view('shop', compact('products','categories'));
    }

    public function search(Request $request)
    {
        //dd($request->search);
        $search = Product::where('pro_name','LIKE','%'.$request->search.'%')->get();
        //$search = json_decode(json_encode($search));
        //echo "<pre>"; print_r($search); die();
        /*GET ALL CATEGORIES AND SUB_CATEGORIES*/
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();


        
        return view('search', compact('search','categories'));
    }
    
    public function product($id)
    {
        error_reporting(0);
        $products = Product::with('attributes')->where(['id' => $id])->first();
        //$products = json_decode(json_encode($products));
        //echo "<pre>"; print_r($products);
        //die();
        $cat_id = $products->cat_id;
        $cat_name = Category::where(['id' => $cat_id])->first();

        $categories = Category::with('categories')->where(['parent_id' => 0])->get();

        $total_stock = ProductAttribute::where('product_id', $id)->sum('stock');
        $pro_images = ProductAttribute::where('product_id', $id)->get();

       




        $users = (Auth::check()) ? User::where('id', Auth::user()->id)->first() : false;




        $relatedProduct = Product::where('id', '!=', $id)->where(['cat_id' => $products->cat_id])->get();
        //$relatedProduct = json_decode(json_encode($relatedProduct));
        //echo "<pre>";print_r($relatedProduct);die();

        /*foreach ($relatedProduct->chunk(3) as $chunk)
        {
            foreach ($chunk as $item)
            {
                echo $item->pro_name."<br>";
            }
            echo "<br><br><br><br>";
        }die();*/

        return view('products-details', compact('products','categories','cat_name','total_stock','relatedProduct','pro_images', 'size','users'));
    }


    public function getProductPrize(Request $request)
    {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die();
        $proArr = explode("-", $data['idSize']);
        $proAttr = ProductAttribute::where(['product_id' => $proArr[0], 'size' => $proArr[1]])->first();

        echo $proAttr->prize;
        echo ",";
        echo $proAttr->stock;
        echo ",";
        echo $proAttr->id;

    }


    public function getProductColor(Request $request)
    {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die();
        $proArr = explode("-", $data['idColor']);
        $proAttr = ProductAttribute::where(['product_id' => $proArr[0], 'color' => $proArr[1]])->first();

        echo $proAttr->image;

    }

    public function check_postal_code(Request $request)
    {
       
        $postal_code = $request->postal_code;
        $postal_code = DB::table('postal_codes')->where('code', $postal_code)->count();
        if ($postal_code>0)
        {
            echo "<p style='color: green'>Available For Devlivery...</p>";
        }
        else
        {
            echo "<p style='color: rgba(244, 12, 67);'> Sorry Shipping is Not Available in Your City...</p>";
        }
    }
}
