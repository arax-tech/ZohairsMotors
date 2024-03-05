@extends('admin.layouts.layout')

@section('content')
<div class="dashboard-wrapper dashboard-wrapper-lg">
	
	<!-- Container fluid Starts -->
	<div class="container-fluid">

	<!-- Top Bar Starts -->
	<div class="top-bar clearfix">
		<div class="row gutter">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="page-title">
					<!-- Top Bar Starts -->
					<div class="top-bar clearfix">
						<div class="row gutter">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="page-title">
									<h3>Order #{{ $orders->id }} Details</h3>
								</div>
							</div>
							
						</div>
					</div>
					<!-- Top Bar Ends -->
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<ul class="right-stats" id="mini-nav-right">
					<li>
						<a href="{{ url('admin/orders')}}" class="btn btn-info btn-rounded bradius"><span class="back">Back</span></a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	<!-- Top Bar Ends -->

	<!-- Row Starts -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
				<div class="panel-body">
					<div class="row">
						@csrf
						<div class="col-md-4">
							<p style=" font-size: 20px;">Shipping Address</p>
							<table class="table table-striped">
								<tr>
									<th>Name</th>
									<td>{{ $orders->user_name }}</td>
								</tr>

								<tr>
									<th>Email</th>
									<td>{{ $orders->user_email }}</td>
								</tr>

								<tr>
									<th>City</th>
									<td>{{ $orders->user_city }}</td>
								</tr>


								<tr>
									<th>State</th>
									<td>{{ $orders->user_state }}</td>
								</tr>

								<tr>
									<th>Address</th>
									<td>{{ $orders->user_address }}</td>
								</tr>


								<tr>
									<th>Mobile</th>
									<td>{{ $orders->user_mobile }}</td>
								</tr>

								<tr>
									<th>Alternative Mobile</th>
									<td>{{ $orders->user_alternative_mobile }}</td>
								</tr>

								<tr>
									<th>Coupon Amount</th>
									<td>{{ $orders->coupon_amount }}</td>
								</tr>


								<tr>
									<th>Shipping Charges</th>
									<td>{{ $orders->shipping_charges }}</td>
								</tr>

								<tr>
									<th>Payment Method</th>
									<td>{{ $orders->payment_method }}</td>
								</tr>


								<tr>
									<th>Grand Total</th>
									<td>{{ $orders->grand_total }}</td>
								</tr>


								<tr>
									<th>Order Status</th>
									<td>
										<?php 
											if ($orders->order_status=="In Progress")
											{
											?>
											<span class="badge badge-info">{{ $orders->order_status}}</span>
											<?php
											}
											elseif ($orders->order_status=="Delivered")
											{
											?>
											<span class="badge badge-success">{{ $orders->order_status}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-danger">{{ $orders->order_status}}</span>
											<?php
											}
										?>
									</td>
								</tr>	
							</table>
						</div>


						<div class="col-md-8">
							<p style="font-size: 20px;">Ordered Items</p>
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image">Item</td>
										<td class="description">Pro Name</td>
										
										<td class="price">Pro_Color</td>
										<td class="price">Pro_Size</td>
										<td class="price">Price</td>
										<td class="quantity">Quantity</td>
										<td class="total">Total</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									<?php $total_amount = 0; ?>
									@foreach($orders->orders as $cart)
									<tr >
										<td style="width: 70px;" class="cart_product">
											
											<img class="img-thumbnail" style="width: 60px;" src="{{ asset('back_end/uploads/products/'.$cart->product_image) }}" alt="">
											
										</td>
								

										<td class="cart_price">
											<p style="margin-top: 10px !important;">{{ $cart->product_name }}</p>
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
				</div>
			</div>
		</div>
	<!-- Row Ends -->

		
	</div>
	<!-- Container fluid ends -->

</div>
@endsection