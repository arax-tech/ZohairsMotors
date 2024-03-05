@extends('front.layouts')

@section('title', 'Home')
@section('content')


<!--slider-->
@include('front.inc.slider')
<!--/slider-->
<section>
	<div class="container">
		<div class="row">
			@include('front.inc.sidebar')
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Future Products</h2>
					
					@foreach($products as $product)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img style="height: 250px; width: 100%;" src="{{ asset('back_end/uploads/products/'.$product->pro_imag1) }}" alt="" />
										<h2>Rs: {{ $product->pro_prize }}</h2>
										<p>{{ $product->pro_name }}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs: {{ $product->pro_prize }}</h2>
											<p>{{ $product->pro_name }}</p>
											<a href="{{ url('/product/details/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Details</a>
										</div>
									</div>
									<span class="new" style="background: #e74c3c; padding: 10px; color: #fff; border-radius: 0px 0px 0px 20px;">Future</span>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="{{ url('/product/details/'.$product->id) }}"><i class="fa fa-plus-square"></i>View Details</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach

					
				</div><!--features_items-->
				
				
				
			</div>


			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">On Sale Products</h2>
					
					@foreach($onsale as $product)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
									<div class="productinfo text-center">
										<img style="height: 250px; width: 100%;" src="{{ asset('back_end/uploads/products/'.$product->pro_imag1) }}" alt="" />
										<h2>Rs: {{ $product->pro_prize }}</h2>
										<p>{{ $product->pro_name }}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs: {{ $product->pro_prize }}</h2>
											<p>{{ $product->pro_name }}</p>
											<a href="{{ url('/product/details/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Details</a>
										</div>
									</div>
									<span class="new" style="background: #2ecc71; padding: 10px; color: #fff; border-radius: 0px 0px 0px 20px;">On Sale</span>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="{{ url('/product/details/'.$product->id) }}"><i class="fa fa-plus-square"></i>View Details</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach

					
				</div><!--features_items-->
				
				
				
			</div>
		</div>
	</div>
</section>
@endsection