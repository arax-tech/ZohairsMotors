<style type="text/css">
	.custom-label{cursor: pointer;}
</style>
<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			
			@foreach($categories as $cat)
			@if($cat->status=="Published")
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							{{ $cat->name }}
						</a>
					</h4>
				</div>
				<div id="{{ $cat->id }}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach($cat->categories as $subcat)
							@if($subcat->status=="Published")
							<li><a href="{{ asset('category/'.$subcat->name ) }}">{{ $subcat->name }}</a></li>
							@endif
							@endforeach
						
						</ul>
					</div>
				</div>
			</div>
			@endif
			@endforeach
			
		
			
		</div><!--/category-products-->




		<!-- <h2>Colors Filters</h2>
		<div class="panel-group category-products">
			
			<form method="post" action="{{ url('/filter')}}">
				@csrf

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a>
								<input onchange="javascript:this.form.submit();" id="Black" value="Black" type="checkbox" name="filter">
								<label for="Black" class="custom-label">&nbsp;Black</label>
							</a>
						</h4>
					</div>
				</div>

				<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a>
							<input onchange="javascript:this.form.submit();" value="Blue" id="Blue" type="checkbox" name="filter">
							<label for="Blue" class="custom-label">&nbsp;Blue</label>
						</a>
					</h4>
				</div>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a>
							<input onchange="javascript:this.form.submit();" value="Green" id="Green" type="checkbox" name="filter">
							<label for="Green" class="custom-label">&nbsp;Green</label>
						</a>
					</h4>
				</div>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a>
							<input onchange="javascript:this.form.submit();" value="Yellow" id="Yellow" type="checkbox" name="filter">
							<label for="Yellow" class="custom-label">&nbsp;Yellow</label>
						</a>
					</h4>
				</div>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a>
							<input onchange="javascript:this.form.submit();" value="Gray" id="Gray" type="checkbox" name="filter">
							<label for="Gray" class="custom-label">&nbsp;Gray</label>
						</a>
					</h4>
				</div>
			</div>

			</form>	
		</div> -->
	
		
		
		<div class="shipping text-center">
			<img src="{{ asset('front_end/images/home/shipping.jpg') }}" alt="" />
		</div>
	
	</div>
</div>