@php
	error_reporting(0);
	$categories = DB::table('categories')->whereNotIn('parent_id', [0])->limit(5)->inRandomOrder()->get();
@endphp
<footer id="footer">

	<div class="footer-widget">
		<div class="container">
			<div class="row">
				
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Quock Shop</h2>
						<ul class="nav nav-pills nav-stacked">
							@foreach ($categories as $category)
								<li><a href="{{ url('category/'.$category->name ) }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="single-widget">
						<h2>Policies</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="{{ url('/pages/terms-and-conditions')}}">Terms of Use</a></li>
							<li><a href="{{ url('/pages/privecy-policy') }}">Privecy Policy</a></li>
							<li><a href="{{ url('/pages/refund-policy') }}">Refund Policy</a></li>
							<li><a href="{{ url('/pages/billing-system') }}">Billing System</a></li>
							<li><a href="{{ url('/pages/tracking-system') }}">Tracing System</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="single-widget">
						<h2>About Us</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="{{ url('/pages/company-infirmation')}}">Company Information</a></li>
							<li><a href="{{ url('/pages/careers')}}">Careers</a></li>
							<li><a href="{{ url('/pages/store-location')}}">Store Location</a></li>
							<li><a href="{{ url('/pages/affillate-program')}}">Affillate Program</a></li>
							<li><a href="{{ url('/pages/copyright')}}">Copyright</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3 col-sm-offset-1">
					<div class="single-widget">
						<h2>Get Notifications</h2>
						<form action="#" class="searchform">
							<input type="text" placeholder="Your email address" />
							<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							<p>Get the most recent updates from <br />our site and be updated your self...</p>
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright © {{ date('Y') }} ZohairsMotors Inc. All rights reserved.</p>
				<p class="pull-right">Designed & Devloped by <span><a target="_blank" href="https://fiverr.com/arham_khan_web">Arham Khan</a></span></p>
			</div>
		</div>
	</div>
	
</footer>