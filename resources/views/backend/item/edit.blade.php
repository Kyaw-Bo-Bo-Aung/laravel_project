@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Edit Item</h1>
	          <p>A free and open source Bootstrap 4 admin template</p>
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item"><a href="#">Item</a></li>
	        </ul>
      </div>

       {{-- create form --}}
        <div class="row">
	      <div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4>Item Edit Form</h4>
			        	<form method="POST" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data" class="mt-3">
			        		@csrf
			        		@method('PUT')
				        	<div class="form-group">
				        		<label for="categoryName">Item Name</label>
				        		<input type="text" name="name" id="categoryName" class="form-control @error ('name')is-invalid @enderror" value="{{$item->name}}">
				        		@error('name')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="categoryPhoto">Photo</label>
				        		<ul class="nav nav-tabs" id="myTab" role="tablist">
								  <li class="nav-item">
								    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old photo</a>
								  </li>
								  <li class="nav-item">
								    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New photo</a>
								  </li>
								</ul>
								<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

								  	<img src="{{$item->photo}}" width="200">
								  </div>
								  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								  	<input type="file" name="photo" id="categoryPhoto" class="form-control-file @error ('photo')is-invalid @enderror">
						        		@error('photo')
						        			<div class="alert alert-danger">{{ $message }}</div>
						        		@enderror
								  </div>
								</div>
			        		</div>

				        	<div class="form-group">
				        		<label for="price">Price</label>
				        		<input type="number" name="price" id="price" class="form-control @error ('price')is-invalid @enderror" value="{{$item->price}}">
				        		@error('price')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="discount">Discount</label>
				        		<input type="number" name="discount" id="discount" class="form-control @error ('discount')is-invalid @enderror" value="{{$item->discount}}">
				        		@error('discount')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="description">Description</label>
				        		<input type="text" name="description" id="description" class="form-control @error ('description')is-invalid @enderror" value="{{$item->description}}">
				        		@error('description')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="subcategoryName">Subategory Name</label>
				        		<select class="form-control" name="subcategoryId">
				        			@foreach ($subcategories as $subcategory)
				        			<option value="{{$subcategory->id}}" {{ $item->subcategory_id == $subcategory->id  ? 'selected' : '' }}>{{$subcategory->name}}</option>
				        			@endforeach
				        		</select>
				        		@error('subcategoryId')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="brandName">Brand Name</label>
				        		<select class="form-control" name="brandId">
				        			@foreach ($brands as $brand)
				        			<option value="{{$brand->id}}" {{ $item->brand_id == $brand->id  ? 'selected' : '' }}>{{$brand->name}}</option>
				        			@endforeach
				        		</select>
				        		@error('brandId')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>


				        	
			        		<div class="form-group">
			        			<input type="submit" name="createBtn" class="btn btn-success" value="Update">
			        		</div>
		        		</form>
					</div>
				</div>
			</div>
		</div>



</main>



@endsection