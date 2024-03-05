<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin - Dashboard</title>

		<!-- Bootstrap CSS -->
		<link href="{{ asset('back_end/css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />

		<!-- Main CSS -->
		<link href="{{ asset('back_end/css/main.css') }}" rel="stylesheet" media="screen" />

		<!-- Ion Icons -->
		<link href="{{ asset('back_end/fonts/icomoon/icomoon.css') }}" rel="stylesheet" />

		<!-- C3 CSS -->
		<link href="{{ asset('back_end/css/c3/c3.css') }}" rel="stylesheet" />

		<!-- NVD3 CSS -->
		<link href="{{ asset('back_end/css/nvd3/nv.d3.css') }}" rel="stylesheet" />

		<!-- Horizontal bar CSS -->
		<link href="{{ asset('back_end/css/horizontal-bar/chart.css') }}" rel="stylesheet" />

		<!-- Calendar Heatmap CSS -->
		<link href="{{ asset('back_end/css/heatmap/cal-heatmap.css') }}" rel="stylesheet" />

		<!-- Circliful CSS -->
		<link rel="stylesheet" href="{{ asset('back_end/css/circliful/circliful.css') }}" />

		<!-- OdoMeter CSS -->
		<link rel="stylesheet" href="{{ asset('back_end/css/odometer.css') }}" />

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">	

		<!-- Data Tables -->
		<link rel="stylesheet" href="{{ asset('back_end/css/datatables/dataTables.bs.min.css') }}">
		<link rel="stylesheet" href="{{ asset('back_end/css/datatables/autoFill.bs.min.css') }}">
		<link rel="stylesheet" href="{{ asset('back_end/css/datatables/fixedHeader.bs.css') }}">
		
		<!-- iCkeck CSS -->
		<link href="{{ asset('back_end/css/icheck/custom.css') }}" rel="stylesheet" />
		<link href="{{ asset('back_end/css/icheck/skins/all.css') }}" rel="stylesheet" />

		<link href="{{ asset('back_end/css/style.css') }}" rel="stylesheet" />



		<style type="text/css">
	        .error{color: rgba(244, 12, 67);}
	        .c1{border: 1px rgba(244, 12, 67) ridge !important;}
	    </style>

	</head>

	<body>
		<!-- Loading starts -->
		<div class="loading-wrapper">
			<div class="loading">
				<h5>Loading...</h5>
				<span></span>
				<span></span>
				<span></span>
			
			</div>
		</div>
		<!-- Loading ends -->
		<!-- Header starts -->
		@include('admin.layouts.inc.header')
		<!-- Header ends -->

		<!-- Left sidebar start -->
		@include('admin.layouts.inc.sidebar')
		<!-- Left sidebar end -->

		<!-- Dashboard Wrapper Start -->
		@yield('content')
		<!-- Dashboard Wrapper End -->

		<!-- Footer Start -->
		<footer>
			<div class="row">
				<p class="pull-left">Copyright © <span>{{ date('Y') }}</span> ZohairsMotors Inc. All rights reserved.</p>
				<p class="pull-right">Designed & Devloped by <span><a class="text-primary" target="_blank" href="https://fiverr.com/arham_khan_web">Arham Khan</a></span></p>
			</div>
		</footer>
		<!-- Footer end -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{ asset('back_end/js/jquery.js') }}"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="{{ asset('back_end/js/bootstrap.min.js') }}"></script>

		<!-- Sparkline Graphs -->
		<!-- <script src="js/sparkline/sparkline.js"></script> -->
		<script src="{{ asset('back_end/js/sparkline/retina.js') }}"></script>
		<script src="{{ asset('back_end/js/sparkline/custom-sparkline.js') }}"></script>

		<!-- jquery ScrollUp JS -->
		<script src="{{ asset('back_end/js/scrollup/jquery.scrollUp.js') }}"></script>

		<!-- D3 JS -->
		<script src="{{ asset('back_end/js/d3/d3.v3.min.js') }}"></script>

		<!-- D3 Power Gauge -->
		<script src="{{ asset('back_end/js/d3/d3.powergauge.js') }}"></script>

		<!-- D3 Meter Gauge Chart -->
		<script src="{{ asset('back_end/js/d3/gauge.js') }}"></script>
		<script src="{{ asset('back_end/js/d3/gauge-custom.js') }}"></script>

		<!-- C3 Graphs -->
		<script src="{{ asset('back_end/js/c3/c3.min.js') }}"></script>
		<script src="{{ asset('back_end/js/c3/c3.custom.js') }}"></script>

		<!-- NVD3 JS -->
		<script src="{{ asset('back_end/js/nvd3/nv.d3.js') }}"></script>
		<script src="{{ asset('back_end/js/nvd3/nv.d3.custom.boxPlotChart.js') }}"></script>
		<script src="{{ asset('back_end/js/nvd3/nv.d3.custom.stackedAreaChart.js') }}"></script>

		<!-- Horizontal Bar JS -->
		<script src="{{ asset('back_end/js/horizontal-bar/horizBarChart.min.js') }}"></script>
		<script src="{{ asset('back_end/js/horizontal-bar/horizBarCustom.js') }}"></script>

		<!-- Gauge Meter JS -->
		<script src="{{ asset('back_end/js/gaugemeter/gaugeMeter-2.0.0.min.js') }}"></script>
		<script src="{{ asset('back_end/js/gaugemeter/gaugemeter.custom.js') }}"></script>

		<!-- Calendar Heatmap JS -->
		<script src="{{ asset('back_end/js/heatmap/cal-heatmap.min.js') }}"></script>
		<script src="{{ asset('back_end/js/heatmap/cal-heatmap.custom.js') }}"></script>

		<!-- Odometer JS -->
		<script src="{{ asset('back_end/js/odometer/odometer.min.js') }}"></script>
		<script src="{{ asset('back_end/js/odometer/custom-odometer.js') }}"></script>

		<!-- Peity JS -->
		<script src="{{ asset('back_end/js/peity/peity.min.js') }}"></script>
		<script src="{{ asset('back_end/js/peity/custom-peity.js') }}"></script>

		<!-- Circliful js -->
		<script src="{{ asset('back_end/js/circliful/circliful.min.js') }}"></script>
		<script src="{{ asset('back_end/js/circliful/circliful.custom.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('back_end/js/custom.js') }}"></script>
		<script src="{{ asset('back_end/js/my_custom.js') }}"></script>
		
		<!-- Data Tables -->
		<script src="{{ asset('back_end/js/datatables/dataTables.min.js') }}"></script>
		<script src="{{ asset('back_end/js/datatables/dataTables.bootstrap.min.js') }}"></script>
		<script src="{{ asset('back_end/js/datatables/autoFill.min.js') }}"></script>
		<script src="{{ asset('back_end/js/datatables/autoFill.bootstrap.min.js') }}"></script>
		<script src="{{ asset('back_end/js/datatables/fixedHeader.min.js') }}"></script>
		<script src="{{ asset('back_end/js/datatables/custom-datatables.js') }}"></script>


		<!-- Sweet Alert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


		<script src="{{ asset('back_end/ckeditor/ckeditor.js') }}"></script>
		
		<script>
		    CKEDITOR.replace('desc' );
		</script>



		<!-- JQuery Validation -->
    	<script src="{{asset ('jquery-validation/dist/jquery.validate.min.js') }}"></script>

    	@if(Session::has('flash_message_error'))
    		<script>
    			Swal.fire({
    			  icon: 'error',
    			  title: 'Oops...',
    			  text: '{!! session('flash_message_error') !!}',
    			});
    		</script>
    	@endif

    	@if(Session::has('flash_message_success'))
    		<script>
    			Swal.fire(
    			'{!! session('flash_message_success') !!}',
    	        '',
    	        'success'
    			)
    		</script>
    	@endif


    	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    	  <script>
    	  	$('#datepicker').datepicker({
    	  	    minDate: 0,
    	  	    dateFormat: 'yy-mm-dd'
    	  	});
    	  
    	  </script>
     	<script>
     		$(document).ready(function() {
     			
     		   $('#file').on('change',function(){
 		       //alert('Working');
 		       var id = $("#id").val();  
 		       var file_data = $('#file').prop('files')[0];   
 		       var form_data = new FormData();                  
 		       form_data.append('file', file_data);
 		       form_data.append('_token', "{{csrf_token()}}");
 		       $("#loading").modal('show');
 		       $.ajax({
 		           url: "profile/update/"+id,
 		           type: "POST",
 		           data: form_data,
 		           contentType: false,
 		           cache: false,
 		           processData:false,
 		           success: function(data){
 		               $("#loading").modal('hide');
 		               $('html').find('#porfile_image, #sidebar_image').attr('src' , data.file)
 		           }
 		       });
 		   });
     		});
     	</script>


     	<script type="text/javascript">
     	$(".DeleteCoupon").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/coupon/delete/'+id;
			});
     	});



     	$(".del_attrib").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/attributes/delete/'+id;
			});
     	});



		$(".DeletePages").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/pages/delete/'+id;
			});
     	});


     	$(".del_user").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/user/delete/'+id;
			});
     	});




     	$(".del_product").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/product/delete/'+id;
			});
     	});


     	$(".del_category").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/category/delete/'+id;
			});
     	});




     	/*delete Slider*/
     	$(".del_slider").click(function(){
     	    var id = $(this).attr('rel');
			Swal.fire({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			});
			
			$('.swal2-confirm').click(function(){
				window.location.href = '{{url('')}}'+ '/admin/slider/delete/'+id;
			});
     	});
     	</script>


    	
	</body>
</html>
