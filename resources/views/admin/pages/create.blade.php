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
									<h3>Create Pages</h3>
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
						<a href="{{ url('admin/pages')}}" class="btn btn-info btn-rounded bradius"><span class="back">Back</span></a>
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
					<form id="form" method="post" action="{{ url('/admin/pages/store')}}">
						@csrf
						<div class="form-group col-md-4">
							<div class="row gutter">
								<label class="control-label">Title</label>
								<input type="text" class="form-control" name="title" required="required" >
							</div>
						</div>


						<div class="form-group col-md-4">
							<div class="row gutter">
								<label class="control-label">Url</label>
								<input type="text" class="form-control" name="url" required="required">
							</div>
						</div>

					

						<div class="form-group col-md-4">
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
								<label class="control-label">Description</label>
								<textarea class="form-control" name="desc" rows="3" required="required"></textarea>
							</div>
						</div>



						
						

						<div class="form-group">
							<div class="row gutter">
								<div class="col-md-12">
									<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Create Pages</button>
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