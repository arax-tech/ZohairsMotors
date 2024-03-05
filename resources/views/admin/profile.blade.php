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
							<h3>Admin Profile</h3>
						</div>
					</div>
					
				</div>
			</div>
			<!-- Top Bar Ends -->

			<!-- Row starts -->
			<div class="row gutter">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="panel height2 " style="height: 300px !important;">
						<div class="panel-body no-padding">
							<div class="">
								<h4 class="no-margin"><i class="icon-user icon-1x"></i> Admin Profile</h4>
								
							</div>
							<br>
							<form method="post" action="{{ url('admin/profile/update_profile/'.$users->id) }}">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Name</label>
										<input type="text" class="form-control" name="name" value="{{ $users->name }}">
									</div>

									<div class="form-group col-md-12">
										<label>Email</label>
										<input type="text" class="form-control" name="email" value="{{ $users->email }}">
									</div>



									<div class="form-group col-md-12">
										<input type="submit" class="btn btn-success btn-rounded btn-block btn-lg" value="Update">
									</div>

									



								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-9 col-xs-12">
					<div class="panel height2 panel-bg-one" style="height: 300px !important;">
						<div class="panel-body">
							<div class="user-profile clearfix">
								
								@if($users->img=='')
								<img id="porfile_image" class="img" src="{{asset('back_end/img/like-arise-dashboard.jpg')}}" alt="User Info">
								@else
								<img id="porfile_image" class="img" src="{{asset('back_end/users/profile/'.$users->img)}}" alt="User Info">
								@endif
								

								
								
								  <!-- Modal -->
								  <div class="modal fade" id="loading" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
								      <br><br><br><br><br><br><br><br><br><br>
								        <div align="center" class="loader"></div>
								      
								      
								    </div>
								  </div>

								
								<div class="user-img">
									<form method="post" action="{{ url('admin/profile/update/'.$users->id) }}" enctype="multipart/form-data">

										<input type="hidden" id="id" name="id" value="{{ $users->id }}">
										<label class="profile_lable" for="file">
											<span class="icon-upload3 orverlay"></span>
										</label>
										<input id="file" type="file" name="file" hidden style="display: none;">

									</form>
									
									
									<span class="completed-info">100%</span>
								</div>
								<h4>Complete</h4>
								<h3>{{ $users->name }}</h3>
								<h4>Profile</h4>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
			<!-- Row ends -->
			

		</div>
		<!-- Container fluid ends -->

</div>

@endsection