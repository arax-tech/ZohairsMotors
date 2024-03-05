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
									<h3>View Products</h3>
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
						<a href="{{ url('admin/product/create')}}" class="btn btn-info btn-rounded bradius"><span class="back">Add Products</span></a>
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
							      <th>Image</th>
							      <th>Name</th>
							      <th>Category</th>
							      <th>Prize </th>
							      <th>Color</th>
							      <th>Pro_Future</th>
							      <th>Status</th>
							      <th class="text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								@foreach($products as $product)
								
								<tr>

									<td class="v-align">
										<img class="pro_img center img-circle" src="{{ asset('back_end/uploads/products/'.$product->pro_imag1 ) }}">
									</td>
								
									<td style="width:18%;" class="v-align">{{ $product->pro_name}}</td>
									<td style="width:18%;" class="v-align">{{ $product->category_name}}</td>
									<td class="v-align">{{ $product->pro_prize}}</td>
									<td class="v-align">{{ $product->pro_color}}</td>
									<td class="v-align">
										<?php 
											if ($product->pro_future=="Future")
											{
											?>
											<span class="badge badge-success">{{ $product->pro_future}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-info">{{ $product->pro_future}}</span>
											<?php
											}

										?>
										</td>
									<td char="v-align">
										<?php 
											if ($product->pro_status=="Published")
											{
											?>
											<span class="badge badge-success">{{ $product->pro_status}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-danger">{{ $product->pro_status}}</span>
											<?php
											}

										?>
									</td>
									<td style="width:25%;" class="text-center v-align" class="text-center">
										<div class="btn-group">
											<a class="btn btn-rounded btn-sm btn-info" href="{{ url('/admin/product/edit/'.$product->id)}}">Update</a>

											<a class="btn btn-rounded btn-sm btn btn-primary" href="{{ url('/admin/product/attributes/'.$product->id)}}">View</a>
											<a class="btn btn-rounded btn-sm btn-success" href="{{ url('/admin/product/attributes/'.$product->id)}}">Attrib</a>

											<a rel="{{ $product->id }}" class="btn btn-rounded btn-sm btn-danger del_product">Delete</a>
											
											

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