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
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Voucher No.</th>
					<th>Order Date</th>
					<th>Arrived Date</th>
					<th>Total Cost</th>
					<th>Status</th>
					<th>detail</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>01928301</td>
					<td>12-11-2020</td>
					<td>12-12-2020</td>
					<td>304000 Ks</td>
					<td><button class="btn btn-success rounded-pill btn-sm"><b>Success</b></button></td>
					<td><button class="btn btn-outline-info">Detail</button></td>
				</tr>
				<tr>
					<td>2</td>
					<td>01928301</td>
					<td>12-11-2020</td>
					<td>12-12-2020</td>
					<td>304000 Ks</td>
					<td><button class="btn btn-danger rounded-pill btn-sm"><b>Delete</b></button></td>
					<td><button class="btn btn-outline-info">Detail</button></td>
				</tr>
				<tr>
					<td>3</td>
					<td>01928301</td>
					<td>12-11-2020</td>
					<td>12-12-2020</td>
					<td>304000 Ks</td>
					<td><button class="btn btn-warning rounded-pill btn-sm"><b>Pending</b></button></td>
					<td><button class="btn btn-outline-info">Detail</button></td>
				</tr>
			</tbody>
		</table>

	</div>
@endsection