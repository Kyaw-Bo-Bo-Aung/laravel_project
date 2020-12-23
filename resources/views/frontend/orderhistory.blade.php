@extends('frontend/frontend_master')
@section('content')
{{-- <h1>Order History</h1> --}}
	<div class="CartBanner">
		<div class="CartText">
			<h1 class="text-center"> &nbsp; Order History</h1>
		</div>
		<img src="https://www.enclavesuites.com/wp-content/uploads/shoppinggirls_banner.jpg" class="img-fluid CartBannerImg">
	</div>


	<div class="container my-5">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Order No.</th>
					<th>Order Date</th>
					<th>Total Cost</th>
					<th>Status</th>
					<th>detail</th>
				</tr>
			</thead>
			<tbody>
				@php $j = 1; @endphp
				@foreach($orders as $order)
				<tr>
					<td>{{$j++}}</td>
					<td>{{$order->orderno}}</td>
					<td>{{$order->orderdate}}</td>
					<td>{{$order->total}} Ks</td>
					<td>
						@if($order->status == 0)
						<p class="btn btn-warning rounded-pill btn-sm"><b>Pending</b></p>

						@elseif($order->status == 1)
						<p class="btn btn-success rounded-pill btn-sm"><b>Success</b></p>

						@elseif($order->status == 2)
						<p class="btn btn-danger rounded-pill btn-sm"><b>Cancel</b></p>
						@endif
					</td>
					<td><button class="btn btn-outline-info">Detail</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
@endsection