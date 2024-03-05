
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		
		<!-- Error CSS -->
		<link href="{{ asset('back_end/css/login.css')}} " rel="stylesheet" media="screen">

		<link href="{{ asset('back_end/css/bootstrap.min.css')}} " rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="{{ asset('back_end/css/animate.css')}} " rel="stylesheet" media="screen">

		<!-- Ion Icons -->
		<link href="{{ asset('back_end/fonts/icomoon/icomoon.css')}} " rel="stylesheet" />

		<!-- Sweet Alert -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	</head>
	<body>
		<form action="{{ url('/admin/login') }}" id="wrapper" method="post">
			@csrf
			<div id="box" class="animated bounceIn">
				<div id="top_header">
					<img style="margin-left: 36%; margin-top: -20px; margin-bottom: -10px;" src="{{ asset('back_end/img/logo.png') }}" alt="Arise Admin Dashboard Logo" />
					<h5>Admin - Login</h5>
				</div>
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
				

				<div id="inputs">
					<div class="form-block">
						<input type="email" placeholder="Email" name="email">
						<i class="icon-user-check"></i>
					</div>
					<div class="form-block">
						<input type="password" placeholder="Password" name="password">
						<i class="icon-spell-check"></i>
					</div>
					<input type="submit" value="Sign In">
				</div>
				<div id="bottom" class="clearfix">
					
					
						

						
				</div>
			</div>
		</form>
	</body>
</html>