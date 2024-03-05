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
									<h3>Update Status</h3>
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
					<form id="form" method="post" action="{{ url('/admin/orders/update',$orders->id)}}">
						@csrf
						
					



						<div class="form-group col-md-12">
							<div class="row gutter">
								<label class="control-label">Status Status </label>
								<select class="form-control" name="status">
									<option value="In Progress"
									@if($orders->order_status=="In Progress")
										selected
									@endif
									>In Progress</option>
									<option value="Delivered"
									@if($orders->order_status=="Delivered")
										selected
									@endif
									>Delivered</option>
									<option value="Cancelled"
									@if($orders->order_status=="Cancelled")
										selected
									@endif
									>Cancelled</option>
								</select>
							</div>
						</div>
						

						<div class="form-group">
							<div class="row gutter">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Update Status</button>
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