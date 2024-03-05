@extends('front.layouts')

@section('title', $categoriesDetails->name)
@section('content')
<section>
	<div class="container">
		<div class="row">
			@include('front.inc.sidebar')
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">{{ $categoriesDetails->name }}</h2>
					
					@foreach($products as $product)
					@if($product->pro_status=="Published")
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
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href="{{ url('/product/details/'.$product->id) }}"><i class="fa fa-plus-square"></i>View Details</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endif
					@endforeach

					{{ $products->links() }}
					
				</div><!--features_items-->
				
				
			</div>
		</div>
	</div>
</section>
@endsection