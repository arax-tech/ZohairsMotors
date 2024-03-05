@extends('front.layouts')

@section('content')

<style type="text/css">
	input[type=text]{outline: none;background: #F0F0E9 !important; border: 0 none !important; margin-bottom: 10px !important; padding: 10px !important; width: 100% !important; font-weight: 300 !important;};
	textarea{outline: none;};

</style>
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Checkout Page</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="step-one">
			<h2 class="heading">Please Provide Shiping Details</h2>
		</div>
		


		<div class="shopper-informations">
			<div class="row">
				




				<form id="account_form" method="post" action="{{ url('/checkout/place-order') }}">
					@csrf
					<div class="col-md-6">
						<p style="color: #696763; font-size: 20px; font-weight: 300;">Shipping Address</p>
						
						<input type="hidden" name="user_id" value="{{ $users->id }}">  

						<input type="text" required="required" name="user_name" placeholder="Name" value="{{ $users->name }}">  

						<input type="text" required="required" name="user_email" placeholder="Email" value="{{ $users->email }}">  
						<input type="text" name="user_city" placeholder="City *" required="required"  value="{{ $users->city }}">
						<select required="required" name="user_state" style="margin-bottom: 10px; padding: 10px; outline: none;">
							<option selected disabled>-- State / Province *--</option>
							<option value="KPK"
							@if($users->state == "KPK")
							selected
							@endif
							>KPK</option>
							<option value="Punjab"
							@if($users->state == "Punjab")
							selected
							@endif>Punjab</option>
							<option value="AJK"
							@if($users->state == "AJK")
							selected
							@endif
							>AJK</option>
							<option value="Sindh"
							@if($users->state == "Sindh")
							selected
							@endif
							>Sindh</option>
							<option value="Balochistan"
							@if($users->state == "Balochistan")
							selected
							@endif
							>Balochistan</option>
						</select>

						<input type="text" name="user_address" required="required" placeholder="Address *"  value="{{ $users->address }}">


					
						<input type="text" required="required" name="user_zip" placeholder="Zip / Postal Code *" value="{{ $users->zip }}">
						<input type="text" name="user_phone" placeholder="Phone " value="{{ $users->phone }}">
						<input type="text" name="user_mobile" placeholder="Mobile Number *" required="required"  value="{{ $users->mobile }}">
						<input type="text" name="user_alt_mob" placeholder="Alternative Mobile Number "  value="{{ $users->alternative_mobile }}">

						<input  style="cursor: pointer;" id="cod" type="checkbox" name="payment" value="Cashe On Delivery" required="required">
						<label style="cursor: pointer;" for="cod">Cashe On Delivery (COD)</label>

						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<input  style="cursor: pointer;" id="PayPal"  type="checkbox" name="payment" value="PayPal" required="required">
						<label style="cursor: pointer;" for="PayPal">PayPal</label>

					</div>


					<div class="col-md-6">
						<p style="color: #696763; font-size: 20px; font-weight: 300;">Your Cart Information</p>
						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image">Item</td>
										<td class="description"></td>
										
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
										<td style="width: 130px;" class="cart_product">
											<a href="{{ url('/product/details/'.$cart->product_id ) }}">
												<img class="img-thumbnail" style="width: 60px;" src="{{ asset('back_end/uploads/products/'.$cart->product_image) }}" alt="">
											</a>
										</td>
										<td class="cart_description">
											<h4><a href="{{ url('/product/details/'.$cart->product_id ) }}">{{ mb_strimwidth($cart->product_name, 0,15, "...") }}</a></h4>
											<input type="hidden" name="product_name" value="{{$cart->product_name}}">
										</td>
										
										<td class="cart_price">
											<p style="margin-top: 22px !important;">Rs: {{ $cart->product_prize }}</p>
										</td>

										<td class="cart_price">
											<p  style="margin-top: 22px !important;">{{ $cart->product_qty }}</p>
										</td>
										
										<td class="cart_total">

											<p  style="margin-top: 22px !important; font-size: 18px !important; class="cart_total_price">Rs: {{ $cart->product_prize*$cart->product_qty }}</p>
										</td>
										
									</tr>
									<?php $total_amount = $total_amount + ($cart->product_prize*$cart->product_qty); ?>
									@endforeach

									
								</tbody>
							</table>


						</div>

						<div class="total_area" style="margin-left: -38px;">
							<ul>
								@if(!empty(Session::get('CouponAmount')))
									<li>Sub Total <span>Rs: <?php echo $total_amount; ?></span></li>
									<li>Coupon Discount <span>Rs: <?php echo Session::get('CouponAmount'); ?></span></li>

									<input type="hidden" name="coupon_amount" value="<?php echo Session::get('CouponAmount'); ?>">
									<input type="hidden" name="shipping_charges" value="150">

									<li>Shipping Cost <span>Rs: 150</span></li>
									<?php 
										$grand_total = $total_amount+150;
									?>
									<li>Total <span>Rs: <?php echo $grand_total - Session::get('CouponAmount'); ?></span></li>
									<input type="hidden" name="grand_total" value="<?php echo $grand_total - Session::get('CouponAmount'); ?>">
								@else
									<li>Sub Total <span>Rs: <?php echo $total_amount; ?></span></li>
									<li>Shipping Cost <span>Rs: 150</span></li>

									<?php 
										$grand_total = $total_amount+150;
									?>
									<li>Total <span>Rs: <?php echo $grand_total; ?></span></li>
									<input type="hidden" name="coupon_amount" value="<?php echo Session::get('CouponAmount'); ?>">
									<input type="hidden" name="shipping_charges" value="150">
									<input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
								@endif
							</ul>
						</div>
					
				
				
			</div>
			<div class="step-one">
				<input type="submit" style="padding: 10px; color: #fff; text-align: center; background-color: #FE980F !important; outline: none; width: 100%; border: none;" type="text" value="Place Order">
			</div>
		</div>
	</form>
	<br><br><br>
</div>
</section> <!--/#cart_items-->

@endsection
