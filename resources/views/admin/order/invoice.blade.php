<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style type="text/css">
    	@font-face {
    	  font-family: SourceSansPro;
    	  src: url(SourceSansPro-Regular.ttf);
    	}

    	.clearfix:after {
    	  content: "";
    	  display: table;
    	  clear: both;
    	}

    	a {
    	  color: #0087C3;
    	  text-decoration: none;
    	}

    	body {
    	  position: relative;
    	  width: 21cm;  
    	  height: 29.7cm; 
    	  margin: 0 auto; 
    	  color: #555555;
    	  background: #FFFFFF; 
    	  font-family: Arial, sans-serif; 
    	  font-size: 14px; 
    	  font-family: SourceSansPro;
    	}

    	header {
    	  padding: 10px 0;
    	  margin-bottom: 20px;
    	  border-bottom: 1px solid #AAAAAA;
    	}

    	#logo {
    	  float: left;
    	  margin-top: 8px;
    	}

    	#logo img {
    	  height: 70px;
    	}

    	#company {
    	  float: right;
    	  text-align: right;
    	}


    	#details {
    	  margin-bottom: 50px;
    	}

    	#client {
    	  padding-left: 6px;
    	  border-left: 6px solid #0087C3;
    	  float: left;
    	}

    	#client .to {
    	  color: #777777;
    	}

    	h2.name {
    	  font-size: 1.4em;
    	  font-weight: normal;
    	  margin: 0;
    	}

    	#invoice {
    	  float: right;
    	  text-align: right;
    	}

    	#invoice h1 {
    	  color: #0087C3;
    	  font-size: 2.4em;
    	  line-height: 1em;
    	  font-weight: normal;
    	  margin: 0  0 10px 0;
    	}

    	#invoice .date {
    	  font-size: 1.1em;
    	  color: #777777;
    	}

    	table {
    	  width: 100%;
    	  border-collapse: collapse;
    	  border-spacing: 0;
    	  margin-bottom: 20px;
    	}

    	table th,
    	table td {
    	  padding: 20px;
    	  background: #EEEEEE;
    	  text-align: center;
    	  border-bottom: 1px solid #FFFFFF;
    	}

    	table th {
    	  white-space: nowrap;        
    	  font-weight: normal;
    	}

    	table td {
    	  text-align: right;
    	}

    	table td h3{
    	  color: #57B223;
    	  font-size: 1.2em;
    	  font-weight: normal;
    	  margin: 0 0 0.2em 0;
    	}

    	table .no {
    	  color: #FFFFFF;
    	  font-size: 1.6em;
    	  background: #57B223;
    	}

    	table .desc {
    	  text-align: left;
    	}

    	table .unit {
    	  background: #DDDDDD;
    	}

    	table .qty {
    	}

    	table .total {
    	  background: #57B223;
    	  color: #FFFFFF;
    	}

    	table td.unit,
    	table td.qty,
    	table td.total {
    	  font-size: 1.2em;
    	}

    	table tbody tr:last-child td {
    	  border: none;
    	}

    	table tfoot td {
    	  padding: 10px 20px;
    	  background: #FFFFFF;
    	  border-bottom: none;
    	  font-size: 1.2em;
    	  white-space: nowrap; 
    	  border-top: 1px solid #AAAAAA; 
    	}

    	table tfoot tr:first-child td {
    	  border-top: none; 
    	}

    	table tfoot tr:last-child td {
    	  color: #57B223;
    	  font-size: 1.4em;
    	  border-top: 1px solid #57B223; 

    	}

    	table tfoot tr td:first-child {
    	  border: none;
    	}

    	#thanks{
    	  font-size: 2em;
    	  margin-bottom: 50px;
    	}

    	#notices{
    	  padding-left: 6px;
    	  border-left: 6px solid #0087C3;  
    	}

    	#notices .notice {
    	  font-size: 1.2em;
    	}

    	footer {
    	  color: #777777;
    	  width: 100%;
    	  height: 30px;
    	  position: absolute;
    	  bottom: 0;
    	  border-top: 1px solid #AAAAAA;
    	  padding: 8px 0;
    	  text-align: center;
    	}
    	.btn-success{width: 120px; height: 45px; background: #57B223; color: #fff; float: right; margin-top: -30px; outline: none; border: none; cursor: pointer;}


    	@media print{
    	  .btn-success{display: none;}
    	}

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('front_end/images/home/logo.png') }}">
      </div>
      <div id="company">
        <h2 class="name">Arham Shop</h2>
        <div>Shinkiari Mansehra, KPK</div>
        <div>+92-306-5831989</div>
        <div><a>arham@info.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $orders->user_name }}</h2>
          <div class="address">{{ $orders->user_address }}</div>
          <div class="email"><a>{{ $orders->user_email }}</a></div>
        </div>
        <div id="invoice">
          <h1>INVOICE #{{ $orders->id }}</h1>
          <div class="date">Order Placed: {{ $orders->created_at->format('d M Y') }} </div>
        </div>
      </div>



      <table border="0" cellspacing="0" cellpadding="0">
	      <thead>
	        <tr>
	          <th class="no">S#</th>
              <th class="desc">PRODUCTS NAME </th>
              <th class="unit">COLOR</th>
              <th class="qty">SIZE</th>
              <th class="unit">PRICE</th>
              <th class="qty">QUANTITY</th>
              <th class="total">TOTAL</th>
	        </tr>
	      </thead>
	     	<tbody>
              	@php 
              		$total_amount = 0; 
              		$i=1;
              	@endphp

              	@foreach($orders->orders as $cart)
      	          <tr>
      	            <td class="no">{{ $i++ }}</td>
      	            <td class="desc">
      	            	<h3>{{ $cart->product_name }}</h3>
      	        	</td>
      	            <td class="unit">{{ $cart->product_color }}</td>
      	            <td class="qty">{{ $cart->product_size }}</td>
      	            <td class="unit">Rs: {{ $cart->product_prize }}</td>
      	            <td class="qty">{{ $cart->product_qty }}</td>
      	            <td class="total">Rs: {{ $cart->product_prize*$cart->product_qty }}</td>
      	          </tr>
              		@php 
              			$total_amount = $total_amount + ($cart->product_prize*$cart->product_qty); 
              		@endphp
                	@endforeach
              </tbody>

	      <tfoot>
	        <tr>
	          <td colspan="3"></td>
	          <td colspan="3">SUBTOTAL</td>
	          <td>Rs: {{ $total_amount }}</td>
	        </tr>
	        <tr>
	          <td colspan="3"></td>
	          <td colspan="3">Shipping Cost</td>
	          <td>Rs: 150</td>
	        </tr>

	        <tr>
	          <td colspan="3"></td>
	          <td colspan="3">Coupon Amount</td>
	          <td>Rs: @if($orders->coupon_amount=="") 0 @else {{$orders->coupon_amount}} @endif </td>
	        </tr>
	        <tr>
	          <td colspan="3"></td>
	          <td colspan="3">GRAND TOTAL</td>
	          <td>Rs: {{ $grand_total = $total_amount+150 }}</td>
	        </tr>
	      </tfoot>
	   </table>


      
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">consectetur adipisicing elit, sed do eiusmod tempor incididunt.</div>
      </div>
    </main>
    <button onclick="window.print();" class="btn-success">Print</button>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>