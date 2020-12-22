@extends('frontend/frontend_master')
@section('content')


{{-- banner --}}
	<div class="CartBanner">
		<div class="CartText">
			<h1 class="text-center">Your Shopping Cart</h1>
		</div>
		<img src="https://www.enclavesuites.com/wp-content/uploads/shoppinggirls_banner.jpg" class="img-fluid CartBannerImg">
	</div>
{{-- end banner --}}

{{-- no item --}}
	<div class="container my-5">
			<div class="text-center">
				<h3> There is no item in your cart!</h3>
				<a href="{{route('mainpage')}}" class="btn btn-success my-3 px-3">Continue Shopping</a>
			</div>
	</div>
{{-- end no item --}}

{{-- shopping cart --}}
	<div class="container my-5">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>#</th>
					<th>Product</th>
					<th>Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Sub-total</th>
				</tr>
			</thead>
			<tbody class="mytbody">
				{{-- JS table --}}
			</tbody>
		</table>

		<div>
			<a href="" class="btn btn-outline-primary float-right">Check Out</a>
			<div class="clear"></div>
			<div class="text-center mt-5">
			<a href="{{route('mainpage')}}" class="btn btn-success px-4">Continue Shopping</a>
			</div>
		</div>

		<div class="clear"></div>
	</div>
{{-- end shopping cart --}}
@endsection