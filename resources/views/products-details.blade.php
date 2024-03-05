@extends('front.layouts')

@section('title', $products->pro_name)
@section('content')


<section>
	<div class="container">
			<div class="row">
				@include('front.inc.sidebar')
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
									<a href="{{ asset('/back_end/uploads/products/'.$products->pro_imag1) }}">
										<img id="color_image" src="{{ asset('/back_end/uploads/products/'.$products->pro_imag1) }}" alt="" width="100%" height="360" />
									</a>
								</div>
								
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner thumbnails">
								    	@foreach($pro_images->chunk(3) as $key => $chunks)
											<div class="item @if($key==0) active @endif">
											@foreach($chunks as $items)
												@if($items->image !=null)
													<a href="{{ asset('/back_end/uploads/products/'.$items->image) }}" data-standard="{{ asset('/back_end/uploads/products/'.$items->image) }}">
												  		<img style="width: 85px; rheight: 85px;" src="{{ asset('/back_end/uploads/products/'.$items->image) }}" alt="">
													</a>
												@endif
											  @endforeach
											</div>
										@endforeach
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<form method="post" action="{{ url('/add-to-cart') }}">
								@csrf



								<input type="hidden" name="product_id" value="{{ $products->id }}">
								<input  id="prize" type="hidden" name="pro_prize" value="">
								<input  id="attrib_id" type="hidden" name="attrib_id" value="">
								@guest
								<input  type="hidden" name="user_email" value="">
								@else
								<input  type="hidden" name="user_email" value="{{ $users->email }}">
								@endguest


								<div class="product-information" style="margin-top: -40px;"><!--/product-information-->
									
									<h2>{{ $products->pro_name }}</h2>
									<p>Web ID: {{ $products->pro_code }}</p>
									<p>
										<select id="selColor"  required="required" name="color" style="height: 40px; width: 203px; outline: none; border: none;">
											<option value="">Choose Color</option>
											@foreach($products->attributes as $colors)
												@if($colors->color !=null)
													<option value="{{ $products->id}}-{{ $colors->color }}">{{ $colors->color}}</option>
												@endif
											@endforeach
										</select>
										


										<select id="selSize" required="required" name="size" style="height: 40px; width: 203px; outline: none; border: none;">
											<option value="">Choose Size</option>
											@foreach($products->attributes as $sizes)
												@if($sizes->size !=null)
													<option value="{{ $products->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
												@endif
											@endforeach
										</select>
									</p>
									<p>
										<input type="text" id="postal_code" class="postal_code"  name="postal_code" required="required" placeholder="Check Available Postal Code" style="height: 40px; width: 410px; padding-left: 10px; outline: none; border: none; background: #f0f0e9" >
										<span style="font-family: verdana;" id="goood"></span>
									</p>
									<span>
										<span style="margin-top: -30px;" id="getPrize">Rs: {{ $products->pro_prize }}</span>
										<span id="outofstockhide">
											@if($total_stock>0)
											<label>Quantity:</label>
											<input style="width: 60px;" type="number" name="pro_qty" value="1" min="1">
											<button type="submit" style="margin-top: 12px;" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Add to cart
											</button>
											@endif
										</span>
									</span>
									@if($total_stock>0)
										<p><b>Stock:</b> <span id="availablity">{{ $total_stock }}</p>
									@else
										<p style="color: red !important;"><b>Out Of Stock</b></p></span>
									@endif
									<p><b>Condition:</b> New</p>
									<p><b>Category:</b> {{ $cat_name->name}}</p>
									<a href=""><img src="{{ asset('/front_end/images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</form>
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#delivery" data-toggle="tab">Delivery Option</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12">
									<p><b>Product Description</b></p>
									<p>{!! $products->pro_desc !!}</p>
								</div>
							</div>



							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
									<p><b>Delivery Options</b></p>
									<p>Cashe On Delivery</p>
								</div>
							</div>

							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
									
									<p><b>Delivery Options</b></p>
									<p>Cashe On Delivery</p>
									
								</div>
							</div>
							
							
							
						
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count =1; ?>
								@foreach($relatedProduct->chunk(3) as $chunk)
								<div 
								<?php if ($count==1)
								{
								?>
								class="item active"
								<?php 
								}
								else
								{
								?>
								class="item"
								<?php
								}
								?>
								>
								@foreach($chunk as $item)	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{ url('/product/details/'.$item->id) }}">
														<img style="width: 233px; height: 230px;" src="{{ asset('/back_end/uploads/products/'.$item->pro_imag1) }}" alt="" />
													</a>
													<h2>Rs: {{ $item->pro_prize }}</h2>
													<p><a style="color: #31353d;" href="{{ url('/product/details/'.$item->id) }}">{{ $item->pro_name }}</a></p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								@endforeach
									
								<?php $count++; ?>
								</div>
								@endforeach
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
</section>


	
@endsection