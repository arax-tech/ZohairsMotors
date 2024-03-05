<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use App\User;
use Auth;
class SliderController extends Controller
{
    public function index()
    {
    	$users = User::where('id', Auth::user()->id)->first();
    	$sliders = Slider::all();
    	return view('admin.slider.index', compact('users','sliders'));
    }

     public function create()
    {
    	$users = User::where('id', Auth::user()->id)->first();
    	return view('admin.slider.create', compact('users'));
    }

    public function store(Request $request)
    {
    	//dd($request->all());

    	$slider = New Slider();

    	$slider->heading1 = $request->heading1;
    	$slider->heading2 = $request->heading2;
    	$slider->title = $request->title;


    	if ($request->hasFile('main_image'))
    	{
    		$main_image = $request->main_image->getClientOriginalName();
    		$request->main_image->storeAs('sliders', $main_image, 'my_files');
    		$slider->image1 = $main_image;
    	}
    	else
    	{
    		$slider->image1 = "";
    	}



    	if ($request->hasFile('offer_image'))
    	{
    		$offer_image = $request->offer_image->getClientOriginalName();
    		$request->offer_image->storeAs('sliders', $offer_image, 'my_files');
    		$slider->image2 = $offer_image;
    		
    	}
    	else
    	{
    		$slider->image2 = "";
    	}
    	$slider->status = $request->status;
    	$slider->description = $request->desc;
    	
	   
	   

		$slider->save();
		return redirect('/admin/slider')->with('flash_message_success','Slider Added Success');

    }


    public function edit($id)
    {
    	$users = User::where('id', Auth::user()->id)->first();
    	$sliders = Slider::find($id);
    	return view('admin.slider.update', compact('users','sliders'));
    }

    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$slider = Slider::find($id);

    	$slider->heading1 = $request->heading1;
    	$slider->heading2 = $request->heading2;
    	$slider->title = $request->title;


    	if ($request->hasFile('main_image'))
    	{
    		$main_image = $request->main_image->getClientOriginalName();
    		$request->main_image->storeAs('sliders', $main_image, 'my_files');
    		$slider->image1 = $main_image;
    	}
    	else
    	{
    		$slider->image1 = $request->current_main_image;
    	}



    	if ($request->hasFile('offer_image'))
    	{
    		$offer_image = $request->offer_image->getClientOriginalName();
    		$request->offer_image->storeAs('sliders', $offer_image, 'my_files');
    		$slider->image2 = $offer_image;
    		
    	}
    	else
    	{
    		$slider->image2 = $request->current_offer_image;
    	}
    	$slider->status = $request->status;
    	$slider->description = $request->desc;
    	
	   
	   

		$slider->update();
		return redirect('/admin/slider')->with('flash_message_success','Slider Updated Success');
    }


    public function delete($id)
    {
    	$delete = Slider::find($id)->delete();
    	return redirect()->back()->with('flash_message_success','Slider Delete Success');
    }
}
