@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Create Item</h1>
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
			            <h4>Item Create Form</h4>
			        	<form method="POST" action="{{route('items.store')}}" enctype="multipart/form-data" class="mt-3">
			        		@csrf
				        	<div class="form-group">
				        		<label for="categoryName">Item Name</label>
				        		<input type="text" name="name" id="categoryName" class="form-control @error ('name')is-invalid @enderror">
				        		@error('name')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="categoryPhoto">Photo</label>
				        		<input type="file" name="photo" id="categoryPhoto" class="form-control-file @error ('photo')is-invalid @enderror">
				        		@error('photo')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
			        		</div>

				        	<div class="form-group">
				        		<label for="price">Price</label>
				        		<input type="number" name="price" id="price" class="form-control @error ('price')is-invalid @enderror">
				        		@error('price')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="discount">Discount</label>
				        		<input type="number" name="discount" id="discount" class="form-control @error ('discount')is-invalid @enderror" value="0">
				        		@error('discount')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="description">Description</label>
				        		<input type="text" name="description" id="description" class="form-control @error ('description')is-invalid @enderror">
				        		@error('description')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>

				        	<div class="form-group">
				        		<label for="subcategoryName">Subategory Name</label>
				        		<select class="form-control" name="subcategoryId">
				        			@foreach ($subcategories as $subcategory)
				        			<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
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
				        			<option value="{{$brand->id}}">{{$brand->name}}</option>
				        			@endforeach
				        		</select>
				        		@error('brandId')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>


				        	
			        		<div class="form-group">
			        			<input type="submit" name="createBtn" class="btn btn-success" value="Add">
			        		</div>
		        		</form>
					</div>
				</div>
			</div>
		</div>



</main>



@endsection