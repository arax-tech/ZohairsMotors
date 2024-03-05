@extends('front.layouts')

@section('content')


<section id="form"><!--form-->
	<div class="container">
		<div class="row">

			<!-- Login  -->
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					<form id="validate" method="post" action="{{ url('/user-login') }}">
						@csrf
						<input type="email" name="email" placeholder="Email Address" required="required">
						<input type="password" name="password" placeholder="Password" required="required">
						
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>

			<!-- Register -->
			<div class="col-sm-4">
				<div class="signup-form">
					<h2>New User Signup!</h2>
					<form id="validate" method="post" action="{{ url('/login-register/store')}}">
						@csrf
						<input type="text" name="name" placeholder="Name" required="required">
						<input type="email" id="current_email" name="email" placeholder="Email Address" required="required">
						<span id="change"></span>
						<input id="myPassword" type="password" name="password" placeholder="Password" required="required">
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div>
			</div>




		</div>
	</div>
</section><!--/form-->
@endsection