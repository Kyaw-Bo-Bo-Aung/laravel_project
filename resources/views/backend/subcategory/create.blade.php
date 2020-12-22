@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Create Subcategory</h1>
	          <p>A free and open source Bootstrap 4 admin template</p>
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item"><a href="#">Subcategory</a></li>
	        </ul>
      </div>

       {{-- create form --}}
        <div class="row">
	      <div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4>Subcategory Create Form</h4>
			        	<form method="POST" action="{{route('subcategories.store')}}" enctype="multipart/form-data" class="mt-3">
			        		@csrf
				        	<div class="form-group">
				        		<label for="subcategoryName">Subcategory Name</label>
				        		<input type="text" name="subcategoryName" id="subcategoryName" class="form-control @error ('subcategoryName')is-invalid @enderror" value="{{old('subcategoryName')}}">
				        		@error('subcategoryName')
				        			<div class="alert alert-danger">{{ $message }}</div>
				        		@enderror
				        	</div>
				        	<div class="form-group">
				        		<label for="categoryName">Category Name</label>
				        		<select class="form-control" name="categoryId">
				        			@foreach ($categories as $category)
				        			<option value="{{$category->id}}">{{$category->name}}</option>
				        			@endforeach
				        		</select>
				        		@error('categoryName')
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