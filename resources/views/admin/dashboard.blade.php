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
						<h3>Dashboard</h3>
						<p>Welcome Back - <span class="text-success">{{ $users->name}}</span></p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<ul class="right-stats" id="mini-nav-right">
						<li>
							<a href="javascript:void(0)" class="btn btn-danger"><span>76</span>Sales</a>
						</li>
						<li>
							<a href="tasks.html" class="btn btn-info">
								<span>18</span>Tasks</a>
						</li>
						<li>
							<a href="javascript:void(0)" class="btn btn-success"><i class="icon-download6"></i> Export</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Top Bar Ends -->

		<!-- Row starts -->
		<div class="row gutter">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="panel">
					<div class="website-performance">
						<div class="row gutter">
							<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
								<div class="performance">
									<h5>Sales</h5>
									<div class="performance-graph">
										<div id="sales" class="chart-height5"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
								<div class="performance-stats">
									<h3 id="salesOdometer" class="odometer">0</h3>
									<p>21.2%<i class="icon-triangle-up up"></i></p>
									<p>vs. 6.5% (prev.)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="panel">
					<div class="website-performance">
						<div class="row gutter">
							<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
								<div class="performance">
									<h5>Expenses</h5>
									<div class="performance-graph">
										<div id="expenses" class="chart-height5"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
								<div class="performance-stats">
									<h3 id="expensesOdometer" class="odometer">0</h3>
									<p>15.7%<i class="icon-triangle-down down"></i></p>
									<p>vs. 8.3% (prev.)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="panel">
					<div class="website-performance">
						<div class="row gutter">
							<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
								<div class="performance">
									<h5>Profits</h5>
								</div>
								<div class="performance-graph">
									<div id="profits" class="chart-height5"></div>
								</div>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
								<div class="performance-stats">
									<h3 id="profitsOdometer" class="odometer">0</h3>
									<p>19.3%<i class="icon-triangle-up up"></i></p>
									<p>vs. 8.8% (prev.)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Row ends -->

		<!-- Row starts -->
		<div class="row gutter">
			<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<div class="panel height2">
					<div class="panel-heading">
						<h4>Audience Overview</h4>
					</div>
					<div class="panel-body">
						<div id="stackedAreaChart" class="chart-height1">
							<svg></svg>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
				<div class="row gutter">
					<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
						<div class="panel height1">
							<div class="panel-heading">
								<h4>Sessions</h4>
							</div>
							<div class="panel-body">
								<div class="sessions">
									<h2 class="text-danger">46K</h2>
									<div id="sessions" class="graph"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
						<div class="panel height1">
							<div class="panel-heading">
								<h4>Users</h4>
							</div>
							<div class="panel-body">
								<div class="sessions">
									<h2 class="text-warning">27K</h2>
									<div id="users" class="graph"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
						<div class="panel height1">
							<div class="panel-heading">
								<h4>Duration</h4>
							</div>
							<div class="panel-body">
								<div class="sessions">
									<h2 class="text-success">21.55</h2>
									<div id="duration" class="graph"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
						<div class="panel height1">
							<div class="panel-heading">
								<h4>Bounce Rate</h4>
							</div>
							<div class="panel-body">
								<div class="sessions">
									<h2 class="text-info">12.4%</h2>
									<div id="bouncerate" class="graph"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Row ends -->

	
	</div>
	<!-- Container fluid ends -->

</div>
@endsection