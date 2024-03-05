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
									<h3>View Category</h3>
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
						<a href="{{ url('admin/category/create')}}" class="btn btn-info btn-rounded bradius"><span class="back">Add Category</span></a>
					</li>
					
				</ul>
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
							      <th class="width-s">Id</th>
							      <th class="width-s">Category Title</th>
							      <th class="width-s">Sub Category</th>
							      <th class="width-s">Category Description</th>
							      <th class="width-s">Category Status</th>
							      <th class="width-w text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								<?php $i=1; ?>
								@foreach($categories as $category)
								<tr>

									<td class="v-align">{{ $i++ }}</td>
									<td class="v-align">{{ $category->name}}</td>
									<td class="v-align">{{ $category->parent_id}}</td>
									<td class="v-align">{{ $category->description}}</td>
									<td class="v-align">
										<?php 
											if ($category->status=="Published")
											{
											?>
											<span class="badge badge-success">{{ $category->status}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-danger">{{ $category->status}}</span>
											<?php
											}

										?>
									</td>
									<td style="width:20%;" class="text-center v-align" class="text-center">
										<div class="btn-group">
											<a class="btn btn-rounded btn-info" href="{{ url('/admin/category/edit/'.$category->id)}}">Update</a>
											<a rel="{{ $category->id }}" class="btn btn-rounded btn-danger del_category">Delete</a>
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