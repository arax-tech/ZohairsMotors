<div class="vertical-nav">

	<!-- Collapse menu starts -->
	<button class="collapse-menu">
		<i class="icon-menu2"></i>
	</button>
	<!-- Collapse menu ends -->

	<!-- Current user starts -->
	<div class="user-details clearfix">
		<a href="{{ url('/admin/profile') }}" class="user-img">
			
			@if($users->img=='')
			<img id="sidebar_image" src="{{ asset('back_end/img/like-arise-dashboard.jpg') }}" alt="User Info">
			@else
			<img id="sidebar_image" src="{{asset('back_end/users/profile/'.$users->img)}}" alt="User Info">
			@endif
		</a>
		<h5 class="user-name">{{ $users->name }}</h5>
	</div>
	<!-- Current user ends -->

	<!-- Sidebar menu start -->
	<ul class="menu clearfix">
		<li class="{{ (strpos(url()->full() , '/admin/dashboard')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/dashboard')}}">
				<i class="icon-air-play"></i>
				<span class="menu-item">Dashboard</span>
			</a>
		</li>


		<li class="{{ (strpos(url()->full() , '/admin/category')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/category')}}">
				<i class="icon-line-graph"></i>
				<span class="menu-item">Category</span>
			</a>
		</li>


		<li class="{{ (strpos(url()->full() , '/admin/product')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/product')}}">
				<i class="icon-colours"></i>
				<span class="menu-item">Products</span>
			</a>
		</li>


		<li class="{{ (strpos(url()->full() , '/admin/attributes')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/attributes')}}">
				<i class="icon-lab3"></i>
				<span class="menu-item">Products Attributes</span>
			</a>
		</li>


		<li class="{{ (strpos(url()->full() , '/admin/coupon')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/coupon')}}">
				<i class="icon-coin-dollar"></i>
				<span class="menu-item">Coupons</span>
			</a>
		</li>


		<li class="{{ (strpos(url()->full() , '/admin/orders')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/orders')}}">
				<i class="icon-gift2"></i>
				<span class="menu-item">Orders</span>
			</a>
		</li>

		

		<li class="{{ (strpos(url()->full() , '/admin/slider')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/slider')}}">
				<i class="icon-camera5"></i>
				<span class="menu-item">Sliders</span>
			</a>
		</li>

		<li class="{{ (strpos(url()->full() , '/admin/users')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/users') }}">
				<i class="icon-head"></i>
				<span class="menu-item">Users</span>
			</a>
		</li>


		<li class="{{ (strpos(url()->full() , '/admin/pages')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/pages') }}">
				<i class="icon-grid2"></i>
				<span class="menu-item">Pages</span>
			</a>
		</li>

		<li class="{{ (strpos(url()->full() , '/admin/change-password')) ? 'active selected' : ''  }}">
			<a href="{{ url('/admin/change-password') }}">
				<i class="icon-lock-open"></i>
				<span class="menu-item">Change Password</span>
			</a>
		</li>
	</ul>
	<!-- Sidebar menu snd -->
</div>