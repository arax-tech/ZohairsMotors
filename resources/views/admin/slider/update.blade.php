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
									<h3>Update Slider</h3>
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
						<form id="form" method="post" action="{{ url('/admin/slider/update',$sliders->id)}}" enctype="multipart/form-data">
							@csrf
							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Slider Main Heading </label>
									<input type="text" class="form-control" name="heading1" value="{{ $sliders->heading1 }}">
								</div>
							</div>



							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Slider Heading 2</label>
									<input type="text" class="form-control" name="heading2"  value="{{ $sliders->heading2 }}">
								</div>
							</div>

							<div class="form-group col-md-4">
								<div class="row gutter">
									<label class="control-label">Slider Title</label>
									<input type="text" class="form-control" name="title"  value="{{ $sliders->title }}">
								</div>
							</div>

							

							<div class="form-group col-md-5">
								<div class="row gutter">
									<label class="control-label">Slider Main Image </label>
									<input type="hidden" name="current_main_image" value="{{ $sliders->image1 }}">
									<input id="main_image" type="file" class="form-control" name="main_image" >
								</div>
							</div>
							<div class="form-group col-md-1">
								<div class="row gutter">
									<label for="main_image" style="cursor: pointer;">
										<img class="img-thumbnail" style="width: 100%;" class="" src="{{ asset('back_end/uploads/sliders/'.$sliders->image1 ) }}">
									</label>
								</div>
							</div>


							<div class="form-group col-md-5">
								<div class="row gutter">
									<label class="control-label">Slider Main Image </label>
									<input type="hidden" name="current_offer_image" value="{{ $sliders->image2 }}">
									<input id="offer_image" type="file" class="form-control" name="offer_image" >
								</div>
							</div>
							<div class="form-group col-md-1">
								<div class="row gutter">
									<label for="offer_image" style="cursor: pointer;">
										<img class="img-thumbnail" style="width: 100%;" class="" src="{{ asset('back_end/uploads/sliders/'.$sliders->image2 ) }}">
									</label>
								</div>
							</div>




							
							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Status </label>
									<select class="form-control" name="status">
										<option value="Published"
										@if($sliders=="Published")
										{selected}
										@endif
										>Published</option>
										<option value="Drafted"
										@if($sliders=="Drafted")
										{selected}
										@endif
										>Drafted</option>
									</select>
								</div>
							</div>

							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Product Description</label>
									<textarea class="form-control" name="desc" rows="4">{{ $sliders->description }}</textarea>
								</div>
							</div>
							


							<div class="form-group">
								<div class="row gutter">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Update Slider</button>
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