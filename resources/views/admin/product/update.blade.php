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
									<h3>Update Products</h3>
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
						<a href="{{ url('admin/product')}}" class="btn btn-info btn-rounded bradius"><span class="back">Back</span></a>
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
						<form id="form" method="post" action="{{ url('/admin/product/update',$products->id)}}" enctype="multipart/form-data">
							@csrf
							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Name</label>
									<input type="text" class="form-control" name="name" value="{{ $products->pro_name}}">
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Category</label>
									<select class="form-control" name="cat" >
										<?php echo $categories_dropdwon; ?>
									</select>
								</div>
							</div>


							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Prize</label>
									<input type="text" class="form-control" name="prize" value="{{ $products->pro_prize}}">
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Color</label>
									<input type="text" class="form-control" name="color" value="{{ $products->pro_color}}">
								</div>
							</div>


							
							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Code</label>
									<input type="text" class="form-control" name="code" value="{{ $products->pro_code}}">
								</div>
							</div>




							<div class="form-group col-md-3">
								<div class="row gutter">
									<label class="control-label">Product Image </label>
									<input type="hidden" name="current_image1" value="{{ $products->pro_imag1 }}">
									<input id="image1" type="file" class="form-control" name="image1" >
								</div>
							</div>
							<div class="form-group col-md-1">
								<div class="row gutter">
									<label for="image1" style="cursor: pointer;">
										<img class="img-thumbnail" style="width: 100%;" class="" src="{{ asset('back_end/uploads/products/'.$products->pro_imag1 ) }}">
									</label>
								</div>
							</div>


							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Products Future </label>
									<select class="form-control" name="future">
										<option value="">Choose</option>
										<option value="Future"
										@if($products->pro_future=="Future")
										{ selected }
										@endif
										>Future Product</option>
										<option value="On Sale"
										@if($products->pro_future=="On Sale")
										{ selected }
										@endif
										>On Sale</option>
									</select>
								</div>
							</div>

						
							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Status </label>
									<select class="form-control" name="status">
										<option value="Published"
										@if($products->pro_status=="Published")
										{ selected }
										@endif
										>Published</option>
										<option value="Drafted"
										@if($products->pro_status=="Drafted")
										{ selected }
										@endif
										>Drafted</option>
									</select>
								</div>
							</div>

							


						


							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Product Description</label>
									<textarea class="form-control" name="desc" rows="4">
										{{ $products->pro_desc}}
									</textarea>
								</div>
							</div>
							


							<div class="form-group">
								<div class="row gutter">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Update Products</button>
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