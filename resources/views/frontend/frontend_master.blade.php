<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset("access/css/mycss/bootstrap.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("access/css/mycss/style.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("access/fontawesome/css/all.min.css")}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
</head>
<body>
	{{-- <h1>hello frontend</h1> --}}
	<button onclick="topFunction()" id="myCartBtn" title="Go to top"><i class="fas fa-shopping-cart p-1" style="color: white;"></i><span class="itemCount"></span></button>
	{{-- header --}}
	<div class="container">
		<div class="navbar-brand LogoHolder">
			<button class="btn btn-outline-info d-inline-block d-md-none" id="sideBarBtn">
				<i class="fas fa-angle-double-right"></i>
			</button>
			<div class="LogoImg d-inline-block">
				<img src="https://cdn.logo.com/hotlink-ok/logo-social-sq.png" width="100" height="100">
			</div>
			<div class="LogoName d-none d-md-inline-block text-primary">
				<h1>Something</h1>
			</div>
		</div>

		<div class="d-inline-block float-right pt-4">
			<div class="d-inline-block px-3 IconAtag" style="background-color: white; border: 1px solid #0072e1; border-radius: 10px; color: #0072e1;">
				Cost: <span class="costNoti"></span>
			</div>
			<div class="d-inline-block mx-3 IconAtag">
				<a href="{{route('shoppingcart')}}">
					<span><i class="fas fa-shopping-cart fa-2x"></i></span><br>
					<span>Your Cart</span>
				</a>
				<div style="background-color: red; color: white; border-radius: 50%;" class="d-inline-block px-2 cartNoti itemCount">0</div>
			</div>
			<div class="d-inline-block mx-3 IconAtag">
				
				@if (!Auth::user())
				<a href="{{route('loginpage')}}">
					<span><i class="fas fa-user-circle fa-2x"></i></span><br>
					<span>Login</span>
				</a>
				@else
				<li class="nav-item dropdown" style="list-style-type: none;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    	<span><i class="fas fa-user-circle fa-2x"></i></span><br>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
				@endif
				
			</div>
			
		</div>
	</div>

	
	{{-- divnav web--}}
	<div class="navbar navbar-expand-md bg-light navbar-light d-none d-md-block" id="divNav">
		<div class="container">
			<div class="collapse navbar-collapse d-lg-inline-block" id="NavBarNav">
				<ul class="navbar-nav m-auto">
					<li class="nav-item mx-lg-4 mx-xl-5 mx-2"><a href="{{route('mainpage')}}" class="nav-link">Home</a></li>
					{{-- testing --}}
					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        	Categories
				        </a>
				        <x-category-component></x-category-component>
				      
					{{-- <li class="nav-item dropdown mx-lg-4 mx-xl-5 mx-2">
						<a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categories
						</a>
							<div class="dropdown-menu" aria-labelledby="categoryDropdown">

								@foreach ($categories as $category)
								<a class="dropdown-item" href="#">{{$category->name}}</a>
								@endforeach
								

								
							</div>
					</li> --}}
					<li class="nav-item dropdown mx-lg-4 mx-xl-5 mx-2">
						<a class="nav-link dropdown-toggle" href="#" id="brandDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Brand
						</a>
							<x-brand-component></x-brand-component>
					</li>
					<li class="nav-item dropdown mx-lg-4 mx-xl-5 mx-2">
						<a class="nav-link dropdown-toggle" href="#" id="salesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sales
						</a>
							<div class="dropdown-menu" aria-labelledby="salesDropdown">
								<a class="dropdown-item" href="#">Discount & Promotion</a>
								<a class="dropdown-item" href="#">Seasonal Promotion</a>
								<a class="dropdown-item" href="#">something</a>
							</div>
					</li>
					 <li>
					 	<form class="form-inline">
						    <input class="form-control mr-sm-2" type="search" placeholder="Search items" aria-label="Search">
						    <button class="btn btn-outline-success my-2" type="submit"><i class="fas fa-search"></i></button>
						</form>
					 </li>
				</ul>
			</div>
		</div>	
	</div>
	{{-- end divnav --}}

	{{-- divnav mobile sidebar --}}
		{{-- <div class="bg-success" id="sideBarNav">
			<ul class="navbar-nav m-auto">
				<li class="nav-item mx-lg-4 mx-xl-5 mx-2"><a href="" class="nav-link">Home</a></li>
				<li class="nav-item dropdown mx-lg-4 mx-xl-5 mx-2">
					<a class="nav-link dropdown-toggle" href="#" data-target="#categoryDropdown" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
					Categories
					</a>
						<div class="collapse" id="categoryDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
				</li>
				<li class="nav-item dropdown mx-lg-4 mx-xl-5 mx-2">
					<a class="nav-link dropdown-toggle" href="#" data-target="#brandDropdown" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
					Brands
					</a>
						<div class="collapse" id="brandDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
				</li>
				<li class="nav-item dropdown mx-lg-4 mx-xl-5 mx-2">
					<a class="nav-link dropdown-toggle" href="#" data-target="#salesDropdown" role="button" data-toggle="collapse" aria-haspopup="true" aria-expanded="false">
					Sales
					</a>
						<div class="collapse" id="salesDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
				</li>
				<li>
					<form class="form-inline">
					    <input class="form-control mr-sm-2" type="search" placeholder="Search items" aria-label="Search">
					    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
					</form>
				</li>

			</ul>
		</div> --}}
	
	{{-- end divnav mobile sidebar  --}}

	
	
	{{-- endheader --}}

	@yield('content')


	{{-- Footer --}}
	<div class="bg-light py-4">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-5">
					<div>
						<img src="https://cdn.logo.com/hotlink-ok/logo-social-sq.png" width="70" height="70">
						<h3 class="d-inline-block text-primary">Something</h3>
					</div>
					<div class="row footerContact mt-3">
							<div class="col-3 p-2">
								Phone :
							</div>
							<div class="col-9 p-2">
								+959 976543210
							</div>
							<div class="col-3 p-2">
								Email :
							</div>
							<div class="col-9 p-2">
								something@gmail.com
							</div>
							<div class="col-3 p-2">
								Address:
							</div>
							<div class="col-9 p-2">
								Grüne Lagune 54, STRASS, Lower Austria.
							</div>
					</div>
				</div>
				
				<div class="col-12 col-md-7">
					<div>
						<h3 class="mb-3 text-center text-md-left mt-sm-3">About Store</h3>
					</div>
					<div>
						<p class="footerAbout text-justify">Exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<i class="pr-2 fab fa-2x fa-facebook"></i>
						<i class="px-2 fab fa-2x fa-instagram"></i>
						<i class="px-2 fab fa-2x fa-twitter"></i>
						<i class="px-2 fab fa-2x fa-google"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- endfooter --}}
	<script type="text/javascript" src="{{asset('access/js/myjs/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('access/js/myjs/script.js')}}"></script>
	<script type="text/javascript" src="{{asset('access/js/myjs/bootstrap.bundle.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script type="text/javascript">
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

	</script>
@yield('script')
</body>
</html>