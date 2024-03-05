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
									<h3>Create Products</h3>
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
						<form id="form" method="post" action="{{ url('/admin/product/store')}}" enctype="multipart/form-data">
							@csrf
							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Name</label>
									<input type="text" class="form-control" name="name" >
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
									<input type="text" class="form-control" name="prize" >
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Color</label>
									<input type="text" class="form-control" name="color" >
								</div>
							</div>


							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Code</label>
									<input type="text" class="form-control" name="code" >
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Product Image </label>
									<input type="file" class="form-control" name="image1" >
								</div>
							</div>

							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Products Future </label>
									<select class="form-control" name="future">
										<option value="">Choose</option>
										<option value="Future">Future Product</option>
										<option value="On Sale">On Sale</option>
									</select>
								</div>
							</div>


							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Status </label>
									<select class="form-control" name="status">
										<option value="Published">Published</option>
										<option value="Drafted">Drafted</option>
									</select>
								</div>
							</div>

							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Product Description</label>
									<textarea class="form-control" name="desc" rows="4"></textarea>
								</div>
							</div>
							


							<div class="form-group">
								<div class="row gutter">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Create Products</button>
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