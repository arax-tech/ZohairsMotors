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
				<h1 style="font-size: 40px; margin-bottom: 25px;">Pay With Your PayPal Account...</h1>
				<p style="font-size: 30px;">Your Order Number is <b>#<?php echo Session::get('order_id'); ?></b> and Total Payable amount is <b>Rs: <?php echo Session::get('grand_total'); ?></b></p>
			</div>
			<br>
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
			  <input type="hidden" name="cmd" value="_s-xclick">
			  <input type="hidden" name="business" value="arham@info.com">
			  <input type="hidden" name="item_name" value="2">
			  <input type="hidden" name="currency_code" value="USD">
			  <input type="hidden" name="amount" value="2">
			  <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Buy Now">
			  <img src="https://paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</center>
		
	</div>
</section><!--/#do_action-->
@endsection

<?php 
	Session::forget('order_id');
	Session::forget('grand_total');
?>