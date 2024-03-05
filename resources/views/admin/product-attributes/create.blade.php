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
									<h3>Add Products Attributes</h3>
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
						<form method="post" enctype="multipart/form-data" action="{{ url('/admin/product/attributes/store',$products->id)}}">
							@csrf
							<div class="form-group col-md-2">
								<div class="row gutter">
									<label class="control-label">Product Name</label>
									<input disabled="disabled" type="text" class="form-control" name="name" value="{{ $products->pro_name}}">
								</div>
							</div>

							<div class="form-group col-md-2">
								<div class="row gutter">
									<label class="control-label">Product Category</label>
									<select  disabled="disabled" class="form-control" name="cat" >
										<?php echo $categories_dropdwon; ?>
									</select>
								</div>
							</div>


							<div class="form-group col-md-2">
								<div class="row gutter">
									<label class="control-label">Product Prize</label>
									<input disabled="disabled" type="text" class="form-control" name="prize" value="{{ $products->pro_prize}}">
								</div>
							</div>

							<div class="form-group col-md-2">
								<div class="row gutter">
									<label class="control-label">Product Color</label>
									<input disabled="disabled" type="text" class="form-control" name="color" value="{{ $products->pro_color}}">
								</div>
							</div>


							
							<div class="form-group col-md-2">
								<div class="row gutter">
									<label class="control-label">Product Code</label>
									<input disabled="disabled" type="text" class="form-control" name="code" value="{{ $products->pro_code}}">
								</div>
							</div>

							<div class="form-group col-md-2">
								<div class="row gutter">
									<label class="control-label">Status </label>
									<select  disabled="disabled" class="form-control" name="status">
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




							
							<div class="form-group col-md-4">
								<div class="row gutter">

									<div class="col-md-4">
										<label for="image1" style="cursor: pointer;">
											Product Image
											<img class="img-thumbnail" style="width: 100%;" class="" src="{{ asset('back_end/uploads/products/'.$products->pro_imag1 ) }}">
										</label>
									</div>
								</div>
							</div>




							




						

							<div class="form-group col-md-12">
								<div class="row gutter">
									<label class="control-label">Product Attributes</label>
									<div class="field_wrapper">
									    <div class="input-group" style="width: 100%;">
									        <input type="text" class="form-control" name="color[]" placeholder="Color" style="width: 15.4%; margin-right: 4px;">
									        <input type="text" class="form-control" name="size[]" placeholder="Size" style="width: 15.4%; margin-right: 4px;">
									        <input type="number" class="form-control" name="prize[]" placeholder="Prize" style="width: 15.4%; margin-right: 4px;">
									        <input type="number" class="form-control" name="stock[]" placeholder="Stock" style="width: 15.4%; margin-right: 4px;" required="required">
									        <input type="file" class="form-control" name="image[]" style="width: 22%; margin-right: 4px;">

									        <a href="javascript:void(0);" class="add_button" title="Add field"><span class="btn btn-success" style="width: 14.3%; height: 40px; line-height: 27px; font-size: 18px;" >Add Fields</span></a>
									    </div>
									</div>
								</div>
							</div>
						
							


							<div class="form-group">
								<div class="row gutter">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success btn-rounded btn-lg btn-block">Add Products Attributes</button>
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