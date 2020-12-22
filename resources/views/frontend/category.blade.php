@extends('frontend/frontend_master')
@section('content')

<div class="CartBanner">
	<div class="CartText">
		<h1 class="text-center">{{$titleCategories->name}}</h1>
	</div>
	<img src="https://www.enclavesuites.com/wp-content/uploads/shoppinggirls_banner.jpg" class="img-fluid CartBannerImg">
</div>

<div class="container my-5">
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		
	@if($titleCategories->subcategory)
	@foreach ($titleCategories->subcategory as $subcategory)	
		<li class="nav-item">
			<a class="nav-link {{Request::is('$subcategory')?'active':''}}" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{$subcategory->name}}</a>
		</li>
	@endforeach
	@endif
	</ul>
		<hr>
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				{{-- {{dd($subcategory->id)}} --}}
				<div class="row row-cols-lg-4 row-cols-md-3 row-cols-1 row-cols-sm-2">
				@foreach($subcategories as $subcategory)
				@if($subcategory->item)
				@foreach($subcategory->item as $item)
					<div class="col my-3">
						<div class="card">
							<div class="card-header ItemInfo">
								<img src="{{$item->photo}}" class="card-img-top">
							</div>
							<div class="w-100 text-center">
								<a href="" class="btn btn-info ItemInfoBtn btn-block">Detail</a>
							</div>
							
							
							<div class="card-body text-center">
								<span class="text-center d-block">{{$item->name}}</span>
								@if($item->discount!=0)
								<span>{{$item->price}} Ks</span>
								<small><del style="color: red;">{{$item->discount}} Ks</del></small>
								@else
								<span>{{$item->price}} Ks</span>
								@endif
								<button class="btn btn-outline-dark btn-block mt-2">Add to Cart</button>
							</div>
						</div>
					</div>
				
				@endforeach
				@endif
				@endforeach
				</div>
			</div>
		</div>			
</div>




@endsection