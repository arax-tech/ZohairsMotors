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
			  <li class="active">Personal Account</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="step-one">
			<h2 class="heading">{{ $users->name }}, Account</h2>
		</div>
		


		<div class="shopper-informations">
			<div class="row">
				<div class="col-md-3">
					<div class="shopper-info">
						<p>Update Password</p>
						<form id="validate"  method="post" action="{{ url('/account/update-password') }}">
							@csrf
							<input type="text" id="current_pwd" name="current_pwd" placeholder="Current Password" required="required">
							<span id="change"></span>
							<input type="text" name="new_pwd" placeholder="New password" required="required">
							<input type="text" name="confirm_pwd" placeholder="Confirm password" required="required">
							<input type="submit" style="padding: 10px; color: #fff; text-align: center; background-color: #FE980F !important; outline: none; width: 100%; border: none;" type="text" value="Update Password">
						</form>
					</div>
				</div>




				<form id="account_form" method="post" action="{{ url('/account/update-info', $users->id) }}">
					@csrf
					<div class="col-md-3">
						<p style="color: #696763; font-size: 20px; font-weight: 300;">Update Personal Info</p>
						<input type="text" required="required" name="name" placeholder="Name" value="{{ $users->name }}">  
						<input type="text" name="city" placeholder="City *" required="required"  value="{{ $users->city }}">
						<select required="required" name="state" style="margin-bottom: 10px; padding: 10px; outline: none;">
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

						<input type="text" name="address" required="required" placeholder="Address *"  value="{{ $users->address }}">


					</div>
					<div class="col-md-3">
						<p style="color: #fff; font-size: 20px; font-weight: 300;">_</p>
						<input type="text" required="required" name="zip_postal" placeholder="Zip / Postal Code *" value="{{ $users->zip }}">
						<input type="text" name="phone" placeholder="Phone " value="{{ $users->phone }}">
						<input type="text" name="mob_number" placeholder="Mobile Number *" required="required"  value="{{ $users->mobile }}">
						<input type="text" name="alt_mob" placeholder="Alternative Mobile Number "  value="{{ $users->alternative_mobile }}">
					</div>


					<div class="col-md-3">
						<p style="color: #696763; font-size: 20px; font-weight: 300;">Note</p>
						<textarea name="note" style="outline: none; height: 138px; margin-bottom: 10px;" name="message"  placeholder="Special Notes About Your?" rows="16">{{ $users->note }}</textarea>


						<input type="submit" style="padding: 10px; color: #fff; text-align: center; background-color: #FE980F !important; outline: none; width: 100%; border: none;" type="text" value="Update Information">
					</div>
				</form>
				
			</div>
		</div>
		
		<br><br><br>
	</div>
</section> <!--/#cart_items-->
@endsection