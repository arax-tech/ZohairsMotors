<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zohairs Motors - @yield('title')</title>
    <link href="{{ asset('front_end/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('front_end/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('front_end/EasyZoom/css/easyzoom.css') }}" rel="stylesheet">
	<link href="{{ asset('front_end/Strength/css/passtrength.css') }}" rel="stylesheet">
    <style type="text/css">
        .error{color: rgba(244, 12, 67);}
        .c1{border: 1px rgba(244, 12, 67) ridge !important;}
    </style>
</head>

<body>
	<!--header-->
	@include('front.inc.header')
	<!--header-->
	
	
	<!-- Button trigger modal -->
    <!-- 
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#loader">
      Launch demo modal
    </button>
     -->
    <!-- Modal -->
    <div class="modal fade" id="loader" tabindex="-1" role="dialog" >
      <div class="modal-dialog">
        <div class="loader" style="margin: 0 auto; margin-top: 50%;"></div>
      </div>
    </div>
	@yield('content')


	<!--Footer-->
	@include('front.inc.footer')
	<!--Footer-->
	

  
    <script src="{{ asset('front_end/js/jquery.js') }}"></script>
	<script src="{{ asset('front_end/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('front_end/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('front_end/js/price-range.js') }}"></script>
    <script src="{{ asset('front_end/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('front_end/EasyZoom/js/easyzoom.js') }}"></script>
    <script src="{{ asset('front_end/Strength/js/passtrength.js') }}"></script>
    <script src="{{ asset('front_end/js/main.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- JQuery Validation -->
    <script src="{{asset ('jquery-validation/dist/jquery.validate.min.js') }}"></script>


    <script type="text/javascript">

        
        $(document).ready(function(){
            //document.addEventListener('contextmenu', event => event.preventDefault());


            /*Check Current pasword Is Correct OR not*/
            $("#current_pwd").on('change',function(){
                var current_pwd = $(this).val();
                //alert(current_pwd);
                $.ajax({
                    type: 'get',
                    url: 'check-user-pwd',
                    data: {current_pwd:current_pwd},
                    success:function(resp){
                        $("#change").html(resp);

                    },
                    error:function(resp){
                        alert("Opps Try Agian...");
                    }

                });
            });




            /*COD*/
            function SelectPaymentMethod()
            {

                if ($("#cod").is(":checked"))
                {
                    alert("checked");
                }
            }

            /*Require Form*/
            $("#validate").validate({
                rules:{
                        required:true
                },
                highlight:function(element){
                    $(element).addClass("c1");
                },
                unhighlight:function(element){
                    $(element).removeClass("c1");
                }
            });


            $("#account_form").validate({
                rules:{
                        required:true
                }
            });


            /*Check PinCode*/
            $("#postal_code").on('keyup', function(){
                var postal_code = $("#postal_code").val();
                //alert(postal_code);
                var url = "{{ url('check-postal-code') }}";
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {postal_code:postal_code},
                    success:function(resp){
                        $("#goood").html(resp);

                    },
                    error:function(resp){
                        alert("Error This");
                    }
                });
            });


            /*Check Admin Password*/
            $("#current_email").on('change', function(){
                var current_email = $("#current_email").val();
                //alert(current_email);
                $.ajax({
                    type: 'get',
                    url: 'check-email',
                    data: {current_email:current_email},
                    success:function(resp){
                        $("#change").html(resp);

                    },
                    error:function(resp){
                        alert("Error This");
                    }
                });
            });
        });

    </script>
    <script type="text/javascript">
      $(document).ready(function($) {
        $('#myPassword').passtrength({
          minChars: 4,
          passwordToggle: true,
          tooltip: true,
          eyeImg :"{{ asset('front_end/Strength/img/eye.svg') }}" // toggle icon
        });
      });
    </script>


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


    <script type="text/javascript">
    	$(document).ready(function(){

            /*Change Product Prize According to Size*/
    		$("#selSize").on('change', function(){
    		    var idSize = $(this).val();
    		    //alert(idSize);
    		    if (idSize == "")
    		    {
    		    	return false;
    		    }
                var url = "{{ url('get-product-prize') }}";
                $('#loader').modal('show');
    		    $.ajax({
    		    	type: 'get',
    		    	url: url,
    		    	data: {idSize:idSize},
    		    	success:function(resp){
                        //alert(resp);
                        $('#loader').modal('hide');
                        var arr = resp.split(',');
                        $("#getPrize").html("Rs: "+arr[0]);
                        $("#prize").val(arr[0]);
    		    		$("#attrib_id").val(arr[2]);
                        if (arr[1]==0)
                        {
                            $("#outofstockhide").hide();
                            $("#availablity").text(arr[1]);
                        }
                        else
                        {
                            $("#outofstockhide").show();
                            $("#availablity").text(arr[1]   );
                        }
    		    	},error:function(){
    		    		alert('Oopss Error Please Try Agian...');
    		    	}
    		    });
    		});




            $("#selColor").on('change', function(){
                var idColor = $(this).val();
                //alert(idColor);
                if (idColor == "")
                {
                    return false;
                }
                var url = "{{ url('getProductColor')}}";
                $('#loader').modal('show');
                $.ajax({
                    type: 'get',
                    url: url,
                    data: {idColor:idColor},
                    success:function(resp){
                        $('#loader').modal('hide');
                        //alert(resp);
                        $("#color_image").attr("src","../../back_end/uploads/products/"+resp);
                        
                    },error:function(){
                        alert('Oopss Error Please Try Agian...');
                    }
                });
            });






            /*Replace Main Image to Alternative Image*/
            $(".changeimage").click(function(){
                var image = $(this).attr('src');
                $(".mainimage").attr('src',image);
            });

        

            // Instantiate EasyZoom instances
            var $easyzoom = $('.easyzoom').easyZoom();

            // Setup thumbnails example
            var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

            $('.thumbnails').on('click', 'a', function(e) {
                var $this = $(this);

                e.preventDefault();

                // Use EasyZoom's `swap` method
                api1.swap($this.data('standard'), $this.attr('href'));
            });

            // Setup toggles example
            var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

            $('.toggle').on('click', function() {
                var $this = $(this);

                if ($this.data("active") === true) {
                    $this.text("Switch on").data("active", false);
                    api2.teardown();
                } else {
                    $this.text("Switch off").data("active", true);
                    api2._init();
                }
            });





            /*Delete Cart*/

            $(".deleCart").click(function(){
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
                    window.location.href = '{{url('')}}'+ '/cart/delete/'+id;
                });
            });





            $(".DeleteOrders").click(function(){
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
                    window.location.href = '{{url('')}}'+ '/order/delete/'+id;
                });
            });
              
    	});
    </script>
</body>
</html>