@extends('front.layouts')

@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Thanks</li>
			</ol>
		</div>
		
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<center>
			<div class="heading">
				<h1 style="font-size: 40px; margin-bottom: 25px;">Your Order is Placed Successully...</h1>
				<p style="font-size: 30px;">Your Order Number is <b>#<?php echo Session::get('order_id'); ?></b> and Total Payable amount is <b>Rs: <?php echo Session::get('grand_total'); ?></b></p>
				<p style="font-size: 20px; margin-top: 25px;"><b>#thanks</b> for using our store</p>
			</div>
			<br>
			<a href="{{ url('/user-order') }}" class="btn btn-primary btn-lg">View Your Order's</a>
		</center>
		
	</div>
</section><!--/#do_action-->
@endsection

<?php 
	Session::forget('order_id');
	Session::forget('grand_total');
?>