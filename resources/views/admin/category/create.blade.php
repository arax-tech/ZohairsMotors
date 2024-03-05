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
									<h3>Create Category</h3>
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
						<a href="{{ url('admin/category')}}" class="btn btn-info btn-rounded bradius"><span class="back">Back</span></a>
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
						<form id="form" method="post" action="{{ url('/admin/category/store')}}">
							@csrf
							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Category Name</label>
									<input type="text" class="form-control" name="name" required="required">
									<span id="change"></span>
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Sub Category Of</label>
									<select class="form-control" name="parent_id">
										<option selected value="0">Choose</option>
										@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
									<span id="change"></span>
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
									<label class="control-label">Description </label>
									<textarea class="form-control" name="description" rows="4" required="required"></textarea>
								</div>
							</div>


							


							<div class="form-group">
								<div class="row gutter">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Create Category</button>
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