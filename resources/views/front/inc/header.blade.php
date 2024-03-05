<?php 
	use App\Cart;
	$cartcount = Cart::cartcount();
?>

<header id="header">
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> +92-303-5245558</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> info@zohairsmotors.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->
	
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="{{ url('/') }}"><img style="width: 170px !important" src="{{ asset('front_end/logo.png') }}" alt="" /></a>
					</div>
					
				</div>
				<div class="col-sm-8">
					<div class="shop-menu pull-right">
						<ul class="nav navbar-nav">

							@guest
							{{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> --}}
							<li><a href="{{ url('cart') }}">
									<i class="fa fa-shopping-cart"></i>
									Cart
									<span class="badge">{{ $cartcount }}</span>
								</a>
							</li>
							<li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Login</a></li>
							@else
							<li><a href="{{ url('/account')}}"><i class="fa fa-user"></i> Account</a></li>
							<li><a href="{{ url('/user-order') }}"><i class="fa fa-crosshairs"></i> Orders</a></li>
							<!-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> -->
							<li><a href="{{ url('cart') }}">
									<i class="fa fa-shopping-cart"></i>
									Cart
									<span class="badge">{{ $cartcount }}</span>
								</a>
							</li>
							<li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
						
							@endguest

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="{{ url('/home') }}"  class="{{ (strpos(url()->full() , '/home')) ? 'active selected' : ''  }}">Home</a></li>
							<li><a href="{{ url('/shop') }}" class="{{ (strpos(url()->full() , '/shop')) ? 'active selected' : ''  }}">Shop</a></li>
							
							@foreach($categories as $cat)
							@if($cat->status=="Published")
							<li class="dropdown"><a href="#" class="{{ (strpos(url()->full() , '/category/.$subcat->name')) ? 'active selected' : ''  }}">{{ $cat->name }}<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                	@foreach($cat->categories as $subcat)
                                	@if($subcat->status=="Published")
                                    <li><a href="{{ asset('category/'.$subcat->name ) }}">{{ $subcat->name }}</a></li>
                                    @endif
                                   	@endforeach

                                </ul>
                            </li> 
                            @endif
                            @endforeach
							
							
							<li><a href="{{ url('/pages/contact')}}">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class=" pull-right">
						<form action="{{ url('/search') }}">
							<div class="input-group">
								<div class="input-group">
									@php 
										error_reporting(0);
										$search = $_GET['search'];
									@endphp
									@if($search == "")
								  	<input type="text" name="search" class="custom-form-control" placeholder="Search">
								  	@else
								  	<input type="text" name="search" class="custom-form-control" value="{{ $search }}">
								  	@endif


								  <div class="input-group-btn">
								    <input type="submit" value="search" class="custom-input-btn">
								  </div>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header>