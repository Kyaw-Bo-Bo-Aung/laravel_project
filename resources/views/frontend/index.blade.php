@extends('frontend/frontend_master')
@section('content')

{{-- <h1>Hello frontend</h1> --}}
{{-- <button onclick="topFunction()" id="myCartBtn" title="Go to top"><i class="fas fa-shopping-cart p-1" style="color: white;"></i></button> --}}

{{-- carousel --}}
	<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
		<ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="background-color: yellow;"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1" style="background-color: yellow;"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2" style="background-color: yellow;"></li>
		  </ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="https://happy-new-year-2019.me/wp-content/uploads/03/january-new-year-banner-240-f-97815761-omqyhucqjmmlrk3dz048cfi0riyxejei.jpg" class="w-100" height="400px">
			</div>
			<div class="carousel-item">
				<img src="https://mymedicine.com.mm/wp-content/uploads/2020/12/Web-Banner-01.jpg" class="w-100" height="400px">
			</div>
			<div class="carousel-item">
				<img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/black-friday-special-sale-facebook-cover-design-template-cbf3c1c328e95cf7ea0f73fde417d3c1_screen.jpg" class="w-100" height="400px">
			</div>
		</div>
	</div>
{{-- end carousel --}}

{{-- category --}}
	<div class="container my-3">
		<div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
			{{-- loop --}}
			@foreach ($categories as $category)
			<div class="col my-3 CategoryContainer">
				<div class="card CategoryCard">
					<div class="CategoryOverlay">
						<div class="CategoryText">
							<a href="{{route('categoriespage',$category->id)}}" class="btn btn-outline-light rounded-pill">Go Shopping!</a>
						</div>
					</div>
					<img src="{{$category->photo}}" class="img-fluid">
				</div>
				<h4 class="text-center mt-2">{{$category->name}}</h4>
			</div>
			@endforeach
			{{-- end loop --}}
		</div>
	</div>
{{-- end category --}}


{{-- Discount Item --}}
	<div class="container my-3">
		<h3 class="my-3 d-inline-block">Discount Items</h3>
		<div class="float-right my-3">
			<a href="" class="btn btn-outline-info px-3 py-2">More Items <i class="fas fa-chevron-right mx-2"></i></a>
		</div>
		<div class="clear"></div>
		<div class="container">
		<div class="row">
			<div class="MultiCarousel" data-items="1,3,4,5" data-slide="1" id="MultiCarousel"  data-interval="1000">
	            <div class="MultiCarousel-inner">
	            	{{-- Loop --}}
	            	@foreach($items as $item)
	            	@if($item->discount!=0)
	                <div class="item">
	                    <div class="pad15">
	                    	<img src="{{$item->photo}}" class="img-fluid">
	                        <p class="lead">{{$item->name}}</p>
	                        <p>{{$item->price}} Ks</p>
	                        <del><small style="color: red;">{{$item->discount}} Ks</small></del>
	                        <a href="javascript:void(0)" class="btn btn-outline-primary d-block mt-3 AddToCartBtn" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-photo="{{$item->photo}}" data-discount="{{$item->discount}}">Add to cart</a>
	                    </div>
	                </div>
	                @endif
	                @endforeach
	                {{-- end Loop --}}
	               
	            </div>
	            <button class="btn btn-primary leftLst"><</button>
	            <button class="btn btn-primary rightLst">></button>
	        </div>
		</div>
			<div class="dropdown-divider"></div>
		</div>
	</div>
{{-- end Discount Item --}}

{{-- Flash Sale --}}
	<div class="container my-3">
		<h3 class="my-3 d-inline-block">Flash Sales</h3>
		<div class="clear"></div>
		<div class="row row-cols-lg-5 row-cols-md-3 row-cols-2">
			{{-- Loop --}}
			@foreach($items as $item)
			<div class="col my-3">
				<div class="card">
					<img src="{{$item->photo}}" class="img-fluid">
					<p class="text-center">{{$item->name}}</p>
					@if($item->discount==0)
					<span class="text-center">{{$item->price}} Ks</span><br>
					
					@else
					<span class="text-center">{{$item->price}} Ks</span>
					<del class="text-center"><small style="color: red;">{{$item->discount}} Ks</small></del>
					@endif
					<button class="btn btn-outline-secondary d-inline-block ItemDetailIcon"><i class="fas fa-search"></i></button>
					<a href="javascript:void(0)" class="btn btn-outline-primary d-inline-block mt-3 AddToCartBtn" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-photo="{{$item->photo}}" data-discount="{{$item->discount}}">Add to cart</a>
				</div>
			</div>
			@endforeach
			{{-- end Loop --}}
		</div>
		<div class="text-center mb-3">
			<a href="" class="btn btn-outline-info px-3 py-2">Load More <i class="fas fa-chevron-right"></i></a>
		</div>
		<div class="dropdown-divider"></div>
	</div>
{{-- end Flash Sale --}}

{{-- brand --}}
	<div class="container my-3">
		<h2>Brands</h2>
		<div class="brand-carousel section-padding owl-carousel">
			{{-- loop --}}
			@foreach($brands as $brand)
			<div class="single-logo">
				<img src="{{$brand->photo}}" alt="">
			</div>
			@endforeach
			{{-- end loop --}}
			
		</div>
	</div>
{{-- end brand --}}

{{-- Form --}}
	<div class="container my-3">
		<div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 my-3">
			<div class="col py-3 px-2 text-center Award">
				<div class="row m-auto">
					<div class="col-sm-4 col-5 text-right pt-1"><i class="fas fa-truck fa-3x"></i></div>
					<div class="col-sm-8 col-5 text-left">
						<h5>FREE DELIVERY</h5>
						<small>WHOLE COUNTRY</small>
					</div>
				</div>
			</div>
			<div class="col py-3 px-2 text-center Award">
				<div class="row m-auto">
					<div class="col-sm-4 col-5 text-right pt-1"><i class="fas fa-truck fa-3x"></i></div>
					<div class="col-sm-8 col-5 text-left">
						<h5>FREE DELIVERY</h5>
						<small>WHOLE COUNTRY</small>
					</div>
				</div>
			</div>
			<div class="col py-3 px-2 text-center Award">
				<div class="row m-auto">
					<div class="col-sm-4 col-5 text-right pt-1"><i class="fas fa-truck fa-3x"></i></div>
					<div class="col-sm-8 col-5 text-left">
						<h5>FREE DELIVERY</h5>
						<small>WHOLE COUNTRY</small>
					</div>
				</div>
			</div>
			<div class="col py-3 px-2 text-center Award">
				<div class="row m-auto">
					<div class="col-sm-4 col-5 text-right pt-1"><i class="fas fa-truck fa-3x"></i></div>
					<div class="col-sm-8 col-5 text-left">
						<h5>FREE DELIVERY</h5>
						<small>WHOLE COUNTRY</small>
					</div>
				</div>
			</div>
		</div>
	</div>
{{-- Form end --}}




{{-- @section('script') --}}
{{-- <script type="text/javascript">
	// cartBtn
	//Get the button:
	mybutton = document.getElementById("myCartBtn");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	    mybutton.style.display = "block";
	  } else {
	    mybutton.style.display = "none";
	  }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	  document.body.scrollTop = 0; // For Safari
	  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}
	// endCartBtn

</script> --}}
{{-- @endsection --}}

@endsection



<!-- Modal -->
<div class="modal fade ItemDetailModal" id="ItemDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>