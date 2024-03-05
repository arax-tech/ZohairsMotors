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
						<h3>Change Password</h3>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Top Bar Ends -->

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel">
					<div class="panel-body">
						<form id="form" method="post" action="{{ url('/admin/update-password')}}">
							@csrf
							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Current Password</label>
									<input type="text" class="form-control" name="current_password" id="current_password" required="required">
									<span id="change"></span>
								</div>
								
							</div>

							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">New Password </label>
									<input type="text" class="form-control" name="new_password" id="new_password" required="required" >
								</div>
							</div>


							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Confirm Password</label>
									<input type="text" class="form-control" name="confirm_pwd" id="confirm_pwd" required="required">
								</div>
							</div>


							<div class="form-group">
								<div class="row gutter">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Update Password</button>
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