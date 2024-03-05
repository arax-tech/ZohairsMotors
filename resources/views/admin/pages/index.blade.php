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
									<h3>View Pages</h3>
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
						<a href="{{ url('admin/pages/create')}}" class="btn btn-info btn-rounded bradius"><span class="back">Add Pages</span></a>
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
							      <th class="width-s">Title</th>
							      <th class="width-s">Url</th>
							      <th class="width-s">Description</th>
							      <th class="width-s">Status</th>
							      <th class="width-w text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								<?php $i=1; ?>
								@foreach($pages as $page)
								<tr>

									<td class="v-align">{{ $i++ }}</td>
									<td class="v-align">{{ $page->title}}</td>
									<td class="v-align">{{ $page->url}}</td>
									<td class="v-align">{!! mb_strimwidth($page->description, 0, 50, "...") !!}</td>
									
									<td class="v-align">
										<?php 
											if ($page->status=="Published")
											{
											?>
											<span class="badge badge-success">{{ $page->status}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-danger">{{ $page->status}}</span>
											<?php
											}

										?>
									</td>
									<td style="width:20%;" class="text-center v-align" class="text-center">
										<div class="btn-group">
											<a class="btn btn-rounded btn-info" href="{{ url('/admin/pages/edit/'.$page->id)}}">Update</a>

											<a rel="{{$page->id}}" class="btn btn-rounded btn-danger DeletePages" href="javascript:">Delete</a>
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