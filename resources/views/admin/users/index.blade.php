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
									<h3>View Users</h3>
								</div>
							</div>
							
						</div>
					</div>
					<!-- Top Bar Ends -->
				</div>
			</div>
			
		</div>
	</div>
	<!-- Top Bar Ends -->

	<!-- Row Starts -->
	<div class="row gutter">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-blue">
				<div class="panel-body">
					<div class="table-responsive">
						<table id="responsiveTable" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
							<thead>
							  <tr>
							      <th>S#</th>
							      <th>Name</th>
							      <th>Email</th>
							      <th>City</th>
							      <th>State</th>
							      <th>Register date</th>
							      <th  class="text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								<?php $i=1; ?>
								@foreach($user as $use)
								
								<tr>

								
									<td>{{ $i++}}</td>
									<td>{{ $use->name}}</td>
									<td>{{ $use->email}}</td>
									<td>{{ $use->city}}</td>
									<td>{{ $use->state}}</td>
									<td>{{ $use->created_at->format('d M Y')}} </td>
									<td class="text-center v-align" class="text-center">
										<div class="btn-group">

											<a rel="{{ $use->id }}" class="btn btn-rounded btn-sm btn-danger del_user">Delete</a>
											
											

										</div>
									</td>
								</tr>
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