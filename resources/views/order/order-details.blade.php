<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Orders Details</title>
    <link href="{{ asset('front_end/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('front_end/css/style.css') }}" rel="stylesheet">
	<style type="text/css">
		.cart_menu{text-align: center;}
		.my_p_btn{ padding: 15px 25px 15px 25px !important; border-radius: 4px !important;  margin-top: -7px !important;}
		@media print {

		  /* visible when printed */
		  .print {display: none;}
		  .my_p_btn {display: none;}
		  .jumbotron{margin-top: -55px; margin-bottom: -40px; font-size: 60px;}
	</style>
</head><!--/head-->

<body>
	<div class="container">
		<div class="jumbotron">
			<h2 style="text-align: center;">Your Order Information <a style="float: right;" class="btn btn-primary my_p_btn" href="{{ url('/user-order') }}">Back</a></h2>
		</div>
		<div class="shopper-informations">
			<div class="row">
				




					@csrf
					<div class="col-md-4">
						<p style="color: #696763; font-size: 20px; font-weight: 300;">Shipping Address</p>
						<table class="table table-striped">
							<tr>
								<th>Name</th>
								<td>{{ $order_details->user_name }}</td>
							</tr>

							<tr>
								<th>Email</th>
								<td>{{ $order_details->user_email }}</td>
							</tr>

							<tr>
								<th>City</th>
								<td>{{ $order_details->user_city }}</td>
							</tr>


							<tr>
								<th>State</th>
								<td>{{ $order_details->user_state }}</td>
							</tr>

							<tr>
								<th>Address</th>
								<td>{{ $order_details->user_address }}</td>
							</tr>


							<tr>
								<th>Mobile</th>
								<td>{{ $order_details->user_mobile }}</td>
							</tr>

							<tr>
								<th>Alternative Mobile</th>
								<td>{{ $order_details->user_alternative_mobile }}</td>
							</tr>

							<tr>
								<th>Coupon Amount</th>
								<td>{{ $order_details->coupon_amount }}</td>
							</tr>


							<tr>
								<th>Shipping Charges</th>
								<td>{{ $order_details->shipping_charges }}</td>
							</tr>

							<tr>
								<th>Payment Method</th>
								<td>{{ $order_details->payment_method }}</td>
							</tr>


							<tr>
								<th>Grand Total</th>
								<td>{{ $order_details->grand_total }}</td>
							</tr>


							<tr>
								<th>Order Status</th>
								<td>
									<?php 
										if ($order_details->order_status=="In Progress")
										{
										?>
										<span  style="background: #5e83bf; border-radius: 10px; padding: 5px 10px 5px 10px; color: #fff;">{{ $order_details->order_status}}</span>
										<?php
										}
										elseif ($order_details->order_status=="Delivered")
										{
										?>
										<span  style="background: #91c46b; border-radius: 10px; padding: 5px 10px 5px 10px; color: #fff;">{{ $order_details->order_status}}</span>
										<?php
										}
										else
										{
										?>
										<span style="background: #e46321; border-radius: 10px; padding: 5px 10px 5px 10px; color: #fff;">{{ $order_details->order_status}}</span>
										<?php
										}
									?>

								</td>
							</tr>	
						</table>
					</div>


					<div class="col-md-8">
						<p style="color: #696763; font-size: 20px; font-weight: 300;">Your Ordered Items</p>
						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image">Item</td>
										<td class="description">Product Name</td>
										
										<td class="price">Product Color</td>
										<td class="price">Product Size</td>
										<td class="price">Price</td>
										<td class="quantity">Quantity</td>
										<td class="total">Total</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<?php $total_amount = 0; ?>
									@foreach($order_details->orders as $cart)
									<tr >
										<td style="width: 130px;" class="cart_product">
											
											<img class="img-thumbnail" style="width: 60px;" src="{{ asset('back_end/uploads/products/'.$cart->product_image) }}" alt="">
											
										</td>
										<td class="cart_description">
											<h4><a style="color: #FE980F !important" >{{ $cart->product_name }}</a></h4>
											<input type="hidden" name="product_name" value="{{$cart->product_name}}">
										</td>

										<td class="cart_price">
											<p style="margin-top: 10px !important;">{{ $cart->product_color }}</p>
										</td>


										<td class="cart_price">
											<p style="margin-top: 10px !important;">{{ $cart->product_size }}</p>
										</td>
										
										<td class="cart_price">
											<p style="margin-top: 10px !important;">Rs: {{ $cart->product_prize }}</p>
										</td>

										<td class="cart_price">
											<p  style="margin-top: 10px !important;">{{ $cart->product_qty }}</p>
										</td>
										
										<td class="cart_total">

											<p  style="margin-top: 10px !important;" >Rs: {{ $cart->product_prize*$cart->product_qty }}</p>
										</td>
										
									</tr>
									<?php $total_amount = $total_amount + ($cart->product_prize*$cart->product_qty); ?>
									@endforeach

									
								</tbody>
							</table>


						</div>

						
				
				
			</div>
			<div class="step-one">
				<input class="print" style="padding: 10px; color: #fff; text-align: center; cursor: pointer; background-color: #FE980F !important; outline: none; width: 100%; border: none;" onclick="window.print();"  value="Take Print">
			</div>
			<br><br><br><br>
		</div>
	</div>

  
    
</body>
</html>