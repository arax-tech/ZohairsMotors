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
									<h3>Create Slider</h3>
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
						<form id="form" method="post" action="{{ url('/admin/slider/store')}}" enctype="multipart/form-data">
							@csrf
							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Slider Mian Heading</label>
									<input type="text" class="form-control" name="heading1" >
								</div>
							</div>



							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Slider Sub Heading</label>
									<input type="text" class="form-control" name="heading2" >
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Slider Title</label>
									<input type="text" class="form-control" name="title" >
								</div>
							</div>

							

							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Slider Main Image </label>
									<input type="file" class="form-control" name="main_image" >
								</div>
							</div>



							<div class="form-group col-md-6">
								<div class="row gutter">
									<label class="control-label">Slider Offer Image </label>
									<input type="file" class="form-control" name="offer_image" >
								</div>
							</div>

							
							<div class="form-group col-md-12">
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
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Create Slider</button>
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