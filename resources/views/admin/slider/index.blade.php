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
									<h3>View Slider</h3>
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
						<a href="{{ url('admin/slider/create')}}" class="btn btn-info btn-rounded bradius"><span class="back">Add Slider</span></a>
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
							      <th>Mian Image</th>
							      <th>Offer Image</th>
							      <th>Main Heading</th>
							      <th>Sub Heading</th>
							      <th>Title</th>
							      <th>Description</th>
							      <th>Status</th>
							      <th class="text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								@foreach($sliders as $slider)
								<tr>
									<td class="v-align">
										<img class="pro_img center img-circle" src="{{ asset('back_end/uploads/sliders/'.$slider->image1) }}">
									</td>
									<td class="v-align">
										<img class="pro_img center img-circle" src="{{ asset('back_end/uploads/sliders/'.$slider->image2) }}">
									</td>
									<td class="v-align">{{ $slider->heading1 }}</td>
									<td class="v-align">{{ $slider->heading2 }}</td>
									<td class="v-align">{{ $slider->title }}</td>
									
									<td class="v-align">
										{{ mb_strimwidth($slider->description, 0, 20, "...") }}
									</td>
									<td class="v-align">
										<?php 
											if ($slider->status=="Published")
											{
											?>
											<span class="badge badge-success">{{ $slider->status}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-danger">{{ $slider->status}}</span>
											<?php
											}

										?>
									</td>
									<td class="v-align">
										<div class="btn-group">
											
											<a class="btn btn-rounded btn-sm btn-info" href="{{ url('/admin/slider/edit/'.$slider->id)}}">Update</a>


											<a rel="{{ $slider->id }}" class="btn btn-rounded btn-sm btn-danger del_slider">Delete</a>
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