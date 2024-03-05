<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductAttribute;
use App\Category;
use App\Product;
use App\User;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
    	$users = User::where(['id' => Auth::user()->id])->first();
    	$products = Product::orderBy('id','DESC')->get();
    	foreach ($products as $key => $val)
    	{
    		$category_name = Category::where(['id' => $val->cat_id])->first();
    		$products[$key]->category_name = $category_name->name;
    	}
    	//echo "<pre>"; print_r($products); die();
    	return view('admin.product.index', compact('users','products'));
    }

    public function create()
    {
    	$users = User::where(['id' => Auth::user()->id])->first();
    	$categories = Category::where(['parent_id' => 0])->get();
    	$categories_dropdwon = "<option selected disabled>Select</option>";
    	foreach ($categories as $cat)
    	{
    		$categories_dropdwon .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id' => $cat->id])->get();
    			foreach ($sub_categories as $sub_cat)
    			{
    				$categories_dropdwon .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    			}
    	}
    	return view('admin.product.create', compact('users','categories_dropdwon'));
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	$product = New Product();

    	$product->pro_name = $request->name;
    	$product->cat_id = $request->cat;
    	$product->pro_prize = $request->prize;
    	$product->pro_code = $request->code;
    	$product->pro_color = $request->color;
        //$file = $request->file('image1');
        if ($request->hasFile('image1'))
        {
            $file1 = $request->image1->getClientOriginalName();
            $request->image1->storeAs('products', $file1, 'my_files');
            $product->pro_imag1 = $file1;
        }
        else
        {
             $product->pro_imag1 = '';
        }


            

    	$product->pro_desc = $request->desc;
        $product->pro_future = $request->future;
    	$product->pro_status = $request->status;

    	$product->save();
    	return redirect('/admin/product')->with('flash_message_success','Product Added Success');
    }



    public function edit($id)
    {
        $products = Product::find($id);
        $users = User::where(['id' => Auth::user()->id])->first();
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdwon = "<option disabled>Select</option>";
        foreach ($categories as $cat)
        {
            if ($cat->id == $products->cat_id)
            {
                $selected = "selected";
            }
            else
            {
                $selected = "";
            }
            $categories_dropdwon .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
                foreach ($sub_categories as $sub_cat)
                {
                    if ($sub_cat->id == $products->cat_id)
                    {
                        $selected = "selected";
                    }
                    else
                    {
                        $selected = "";
                    }

                    $categories_dropdwon .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
                }
        }
        return view('admin.product.update', compact('products', 'users','categories_dropdwon'));
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        $product = Product::find($id);
        $product->pro_name = $request->name;
        $product->cat_id = $request->cat;
        $product->pro_prize = $request->prize;
        $product->pro_code = $request->code;
        $product->pro_color = $request->color;


        if ($request->hasFile('image1'))
        {
            $file1 = $request->image1->getClientOriginalName();
            $request->image1->storeAs('products', $file1, 'my_files');
            $product->pro_imag1 = $file1;
        }
        else
        {
             $product->pro_imag1 = $request->current_image1;;
        }


        

        $product->pro_desc = $request->desc;
        $product->pro_future = $request->future;
        $product->pro_status = $request->status;

        $product->save();
        return redirect('/admin/product')->with('flash_message_success','Product Update Success');
    }
        


    public function delete($id)
    {
        $product_img = Product::where(['id' => $id])->first();
        $image_path = 'back_end/uploads/products/';
        if (is_file($image_path.$product_img->pro_imag1))
        {
            unlink($image_path.$product_img->pro_imag1);
        }
        
        if (is_file($image_path.$product_img->pro_imag2))
        {
            unlink($image_path.$product_img->pro_imag2);
        }
        if (is_file($image_path.$product_img->pro_imag3))
        {
            unlink($image_path.$product_img->pro_imag3);
        }
       
       
    	$delete = Product::find($id)->delete();
    	return redirect('/admin/product')->with('flash_message_success','Product Delete Success');
    }

    public function product_attributes($id)
    {
        $products = Product::find($id);
        $users = User::where(['id' => Auth::user()->id])->first();
        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdwon = "<option selected disabled>Select</option>";
        foreach ($categories as $cat)
        {
            if ($cat->id == $products->cat_id)
            {
                $selected = "selected";
            }
            else
            {
                $selected = "";
            }
            $categories_dropdwon .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
                foreach ($sub_categories as $sub_cat)
                {
                    if ($sub_cat->id == $products->cat_id)
                    {
                        $selected = "selected";
                    }
                    else
                    {
                        $selected = "";
                    }

                    $categories_dropdwon .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
                }
        }

        return view('admin.product-attributes.create',compact('users','categories_dropdwon','products'));
    }
    public function product_attributes_store(Request $request, $id)
    {
        $data = $request->all();
        //echo "<pre>"; print_r($data); die();
        //dd($data);

        foreach ($data['size'] as $key => $value)
        {
            if (!empty($value))
            {
                
                $atributes = New ProductAttribute();

                $atributes->product_id = $id;
                $atributes->size = $value;
                $atributes->color = $data['color'][$key];


                if($request->hasfile('image'))
                 {
                    foreach($request->file('image') as $image)
                    {
                        $name=$image->getClientOriginalName();
                        $image->storeAs('products', $name, 'my_files');
                        $data[] = $name;  
                    }
                    $atributes->image = $data[$key];

                 }
               
                
                $atributes->prize = $data['prize'][$key];

                $atributes->stock = $data['stock'][$key];
                $atributes->save();

            }
        }
        return redirect('/admin/attributes')->with('flash_message_success','Product Attributes Added');
    }


    public function attributes()
    {
        $users = User::where(['id' => Auth::user()->id])->first();
        $products_attributes = ProductAttribute::orderBy('id','DESC')->get();

        foreach ($products_attributes as $key => $val)
        {
            $pro_name = Product::where(['id' => $val->product_id])->first();
            $products_attributes[$key]->pro_name = $pro_name->pro_name;
        }
        //dd($products_attributes);
        //echo "<pre>"; print_r($products_attributes); die();
        return view('admin.product-attributes.index', compact('users','products_attributes'));
    }


    public function delete_attributes($id)
    {
        $delete = ProductAttribute::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Product Attributes Delete');
    }

}
