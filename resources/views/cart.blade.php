@extends('front.layouts')

@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Color</td>
						<td class="price">Size</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php $total_amount = 0; ?>
					@foreach($cart_item as $cart)
					<tr>
						<td class="cart_product">
							<a href="{{ url('/product/details/'.$cart->product_id ) }}">
								<img class="img-thumbnail" style="width: 80px;" src="{{ asset('back_end/uploads/products/'.$cart->product_image) }}" alt="">
							</a>
						</td>
						<td class="cart_description">
							<h4><a href="{{ url('/product/details/'.$cart->product_id ) }}">{{ $cart->product_name }}</a></h4>
							<p>Stock: {{ $cart->stock }} </p>
						</td>
						<td class="cart_price">
							<p>{{ $cart->product_color }}</p>
						</td>
						<td class="cart_price">
							<p>{{ $cart->product_size }}</p>
						</td>
						<td class="cart_price">
							<p>Rs: {{ $cart->product_prize }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a data-toggle="tooltip" data-placement="top" title="Add to Favorit" class="cart_quantity_up" href="{{ url('/cart/update/'.$cart->id.'/1') }}"> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->product_qty }}" autocomplete="off" size="2">
								@if($cart->product_qty >1 )
								<a class="cart_quantity_down" href="{{ url('/cart/update/'.$cart->id.'/-1') }}"> - </a>
								@endif
							</div>
						</td>
						<td class="cart_total">

							<p class="cart_total_price">Rs: {{ $cart->product_prize*$cart->product_qty }}</p>
						</td>
						<td class="cart_delete">
							<a style="cursor: pointer;" rel="{{ $cart->id }}" class="cart_quantity_delete deleCart" ><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php $total_amount = $total_amount + ($cart->product_prize*$cart->product_qty); ?>
					@endforeach

					
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount coupon code you can use.</p>
		</div>
		<div class="row">
			<form method="post" action="{{ url('cart/apply-coupon') }}">
				@csrf
				<div class="col-sm-6">
					<div class="chose_area" style="height: 241px;">
						<ul class="user_info">
							<li class="single_field">
								<label>Coupon Code</label>
								<div class="input-group">
							      <input type="text" name="coupon_code" class="form-control coupon-input" placeholder="Coupon Code">
							     
							    </div>
								
							</li>
							
						</ul>
						<button type="submit" class="btn btn-default coupon-submit">Apply</button>
					</div>
				</div>
			</form>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						@if(!empty(Session::get('CouponAmount')))
							<li>Cart Sub Total <span>Rs: <?php echo $total_amount; ?></span></li>
							<li>Coupon Discount <span>Rs: <?php echo Session::get('CouponAmount'); ?></span></li>
							<li>Shipping Cost <span>Rs: 150</span></li>
							<?php 
								$grand_total = $total_amount+150;
							?>
							<li>Total <span>Rs: <?php echo $grand_total - Session::get('CouponAmount'); ?></span></li>
						@else
							<li>Cart Sub Total <span>Rs: <?php echo $total_amount; ?></span></li>
							<li>Shipping Cost <span>Rs: 150</span></li>

							<?php 
								$grand_total = $total_amount+150;
							?>
							<li>Total <span>Rs: <?php echo $grand_total; ?></span></li>
						@endif
					</ul>
						<a class="btn btn-default update" href="{{ url('/checkout') }}">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
@endsection