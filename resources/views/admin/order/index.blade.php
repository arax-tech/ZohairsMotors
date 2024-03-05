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
									<h3>View Order</h3>
								</div>
							</div>
							
						</div>
					</div>
					<!-- Top Bar Ends -->
				</div>
			</div>
			
		</div>
	</div>
	<!-- Top Bar Ends -->

	<!-- Row Starts -->
	<div class="row gutter">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-blue">
				<div class="panel-body">
					<div class="table-responsive">
						<table id="responsiveTable" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
							<thead>
							  <tr>
							      <th>Order_ID</th>
							      <th>Order_Products</th>
							      <th>Customer_Name</th>
							      <th>Order_Amount</th>
							      <th>Order_Date</th>
							      <th>Status</th>
							      <th  class="text-center">Action</th>
							  </tr>
							</thead>
							
							<tbody>
								@foreach($orders as $order)
								
								<tr>

									<!-- <td class="v-align">
										<img class="pro_img center img-circle" src="{{ asset('back_end/uploads/products/'.$order->pro_imag1 ) }}">
									</td> -->
								
									<td style="text-align: center;" class="v-align">{{ $order->id}}</td>
									<td class="v-align"> 
										@foreach($order->orders as $pro)
										<p style="padding: 5px;">{{ $pro->product_name}}</p>
										@endforeach
									</td>
									<td class="v-align"> &nbsp;&nbsp;&nbsp;	{{ $order->user_name}}</td>
									<td style="text-align: center;" class="v-align">Rs: {{ $order->grand_total}}</td>
									<td style="text-align: center;" class="v-align">{{ $order->created_at = date('d M Y') }}</td>
									<td char="v-align" style="vertical-align: middle;">
								
										<?php 
											if ($order->order_status=="In Progress")
											{
											?>
											<span class="badge badge-info">{{ $order->order_status}}</span>
											<?php
											}
											elseif ($order->order_status=="Delivered")
											{
											?>
											<span class="badge badge-success">{{ $order->order_status}}</span>
											<?php
											}
											else
											{
											?>
											<span class="badge badge-danger">{{ $order->order_status}}</span>
											<?php
											}
										?>
											
									</td>
									<td style="width:25%;" class="text-center v-align" class="text-center">
										<div class="btn-group">
											<a class="btn btn-rounded btn-sm btn-info" href="{{ url('/admin/orders/edit/'.$order->id)}}">Update</a>

											<a class="btn btn-rounded btn-sm btn btn-success" href="{{ url('/admin/orders-details/'.$order->id)}}">View</a>

											<a class="btn btn-rounded btn-sm btn btn-primary" href="{{ url('/admin/orders/invoice/'.$order->id)}}">Invoice</a>

											<a rel="{{ $order->id }}" class="btn btn-rounded btn-sm btn-danger del_product">Delete</a>

										</div>
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Row Ends -->

		
	</div>
	<!-- Container fluid ends -->

</div>
@endsection