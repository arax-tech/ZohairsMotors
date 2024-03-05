<section id="slider">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach($sliders as $key => $slider)
						<li data-target="#slider-carousel" data-slide-to="{{ $key }}" class="@if($key==0)active  @endif"></li>
						@endforeach
					</ol>
					
					<div class="carousel-inner">
						@foreach($sliders as $key => $slider)
						<div class="item @if($key==0)active  @endif">
							<div class="col-sm-6">
								<h1 style="text-transform: uppercase;"><span>{{ $slider->heading1}}</span>-{{ $slider->heading2}}</h1>
								<h2 style="text-transform: uppercase;">{{ $slider->title}}</h2>
								<p>{{ mb_strimwidth($slider->description, 0, 135, "...") }}</p>
								<a href="{{ url('/shop') }}" class="btn btn-default shop_now">Get it now</a>
							</div>
							<div class="col-sm-6">
								<img src="{{ asset('back_end/uploads/sliders/'.$slider->image1) }}" class="girl img-responsive" >
								<img src="{{ asset('back_end/uploads/sliders/'.$slider->image2) }}"  class="pricing">
							</div>
							
						</div>
						@endforeach

						
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section>