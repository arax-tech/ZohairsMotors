@extends('front.layouts')
@section('title', $pages->title)
@section('content')
<section>
	<div class="container">
		<div class="row">
			@include('front.inc.sidebar')
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">{{ $pages->title }}</h2>
					
					
					<p>{!! $pages->description !!}</p>
					
					
				</div><!--features_items-->
				
				
			</div>
		</div>
	</div>
</section>
@endsection