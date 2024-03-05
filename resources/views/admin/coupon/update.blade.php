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
									<h3>Update Coupon</h3>
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
						<a href="{{ url('admin/coupon')}}" class="btn btn-info btn-rounded bradius"><span class="back">Back</span></a>
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
					<form id="form" method="post" action="{{ url('/admin/coupon/update',$coupons->id)}}">
						@csrf
						<div class="form-group col-md-6">
							<div class="row gutter">
								<label class="control-label">Coupon Code</label>
								<input type="text" class="form-control" name="coupon_name" required="required" minlength="6" maxlength="16" value="{{ $coupons->coupon_code }}">
								<span id="change"></span>
							</div>
						</div>


						<div class="form-group col-md-6">
							<div class="row gutter">
								<label class="control-label">Coupon Amount</label>
								<input type="number" min="0" class="form-control" name="coupon_amount" required="required"  value="{{ $coupons->amount }}">
							</div>
						</div>
						<br><br>
						<div class="form-group col-md-4">
							<div class="row gutter">
								<label class="control-label">Coupon Type </label>
								<select class="form-control" name="coupon_type">
									<option value="Percentage"
									@if($coupons->amount_type=="Percentage")
										selected
									@endif
									>Percentage</option>
									<option value="Fixed"
									@if($coupons->amount_type=="Fixed")
										selected
									@endif
									>Fixed</option>
								</select>
							</div>
						</div>

						<div class="form-group col-md-4">
							<div class="row gutter">
								<label class="control-label">Coupon Expiry Date</label>
								<input id="datepicker" type="text" class="form-control" name="coupon_expiry_date" required="required"  value="{{ $coupons->expiry_date }}">
							</div>
						</div>



						<div class="form-group col-md-4">
							<div class="row gutter">
								<label class="control-label">Coupon Status </label>
								<select class="form-control" name="coupon_status">
									<option value="Published"
									@if($coupons->status=="Published")
										selected
									@endif
									>Published</option>
									<option value="Drafted"
									@if($coupons->status=="Drafted")
										selected
									@endif
									>Drafted</option>
								</select>
							</div>
						</div>
						

						<div class="form-group">
							<div class="row gutter">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Update Coupon</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Row Ends -->

		
	</div>
	<!-- Container fluid ends -->

</div>
@endsection