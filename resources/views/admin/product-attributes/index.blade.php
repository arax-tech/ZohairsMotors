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
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="page-title">
									<h3>View Products Attributes</h3>
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
							      <th>Products Image</th>
							      <th>Products Name</th>
							      <th>Color</th>
							      <th>Size</th>
							      <th>Prize</th>
							      <th>Stock</th>
							      <th class="text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								@foreach($products_attributes as $product)
								
								<tr>

									<td class="v-align">
										<img class="pro_img center img-circle" src="{{ asset('back_end/uploads/products/'.$product->image ) }}">
									</td>
									<td class="v-align">{{ $product->pro_name}}</td>
									<td class="v-align">{{ $product->color}}</td>
									<td class="v-align">{{ $product->size}}</td>
									<td class="v-align">{{ $product->prize}}</td>
									<td class="v-align">{{ $product->stock}}</td>
									
									<td style="width:25%;" class="text-center v-align" class="text-center">
										<div class="btn-group">
											<a rel="{{ $product->id }}" class="btn btn-rounded  btn-danger del_attrib">Delete</a>
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