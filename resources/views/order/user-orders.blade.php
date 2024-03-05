@extends('front.layouts')

@section('content')
<style type="text/css">
.cart_price {height: 45px !important; line-height: 45px !important; text-align: center;}
.cart_menu{text-align: center;}
.btn-rounded{padding: 10px 20px 10px 20px !important;}
</style>
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{ url('/') }}">Home</a></li>
			  <li class="active">User Orders</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed table-hover table-striped">
				<thead>
					<tr class="cart_menu">
						<td>Order ID</td>
						<td>Ordered Products</td>
						<td>Payments Method</td>
						<td>Grand Total</td>
						<td>Order Placed Date</td>
						<td>Order Status</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					
					@foreach($orders as $order)
					<tr class="order" style="padding: 55px !important;">
						<td class="cart_price">
							<p>{{ $order->id}}</p>
						</td>

						<td class="cart_price">
							@foreach($order->orders as $pro)
							<p>{{ $pro->product_name }}</p>
							@endforeach
						</td>


						<td class="cart_price">
							<p>{{ $order->payment_method}}</p>
						</td>



						<td class="cart_price">
							<p>{{ $order->grand_total}}</p>
						</td>


						<td class="cart_price">
							<p>
								<?php 
									$intime = strtotime($order->created_at);
									$intime = date('d-M-Y', $intime);
									echo $intime;

								?>
							</p>
						</td>


						<td class="cart_price">
							<p>
								<?php 
										if ($order->order_status=="In Progress")
										{
										?>
										<span  style="background: #5e83bf; border-radius: 10px; padding: 5px 10px 5px 10px; color: #fff;">{{ $order->order_status}}</span>
										<?php
										}
										elseif ($order->order_status=="Delivered")
										{
										?>
										<span  style="background: #91c46b; border-radius: 10px; padding: 5px 10px 5px 10px; color: #fff;">{{ $order->order_status}}</span>
										<?php
										}
										else
										{
										?>
										<span style="background: #e46321; border-radius: 10px; padding: 5px 10px 5px 10px; color: #fff;">{{ $order->order_status}}</span>
										<?php
										}
									?>
								
							</p>
						</td>

						<td class="cart_price">
							<p>
								<div class="btn-group">
									<!-- <a style="border-radius: 30px 0 0 30px !important" rel="{{ $order->id}}" class="btn btn-rounded btn-danger DeleteOrders" >Delete</a>
									<a onclick="window.print();" style="border-radius: 0px 30px 30px 0px !important" class="btn btn-rounded btn-info" >Print</a> -->
									<a href="{{ url('/order/details/'.$order->id) }}" style="border-radius: 10px !important; margin-top: -10px;" class="btn btn-rounded btn-primary" >View All Details</a>
								</div>
							</p>
						</td>

					</tr>
					
					@endforeach

					
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->


@endsection