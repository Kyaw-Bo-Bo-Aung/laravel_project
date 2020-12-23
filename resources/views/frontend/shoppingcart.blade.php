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
 	<div class="container my-5 noItemDiv">
        <div class="text-center">
            <h3> There is no item in your cart!</h3>
            <a href="/" class="btn btn-success my-3 px-3">Go Shopping</a>
        </div>
    </div>
{{-- end no item --}}

{{-- shopping cart --}}
	<div class="container my-5 cartDiv">
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
				
			</tbody>
		</table>

		<div>
			<div class="row">
				<div class="col-md-6 col-12 text-md-left text-center">
					<textarea rows="3" cols="60" placeholder="Write your message here..." class="p-2 note"></textarea>
				</div>
				@guest
					<div class="col-md-6 col-12 text-md-right text-center">
						<a href="{{route('loginpage')}}" class="btn btn-warning">Please, Log in to check out</a>
					</div>
				@else
					<div class="col-md-6 col-12 text-md-right text-center">
						<a href="javascript:void(0)" class="btn btn-outline-primary checkoutBtn">Check Out</a>
					</div>
				@endguest
			</div>
			<div class="clear"></div>
			<div class="text-center mt-5">
			<a href="{{route('mainpage')}}" class="btn btn-success px-4">Continue Shopping</a>
			</div>
		</div>

		<div class="clear"></div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Order Success!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Your order will be arrive soon!
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
{{-- end shopping cart --}}
@endsection

