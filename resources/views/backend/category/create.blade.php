@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Create Category</h1>
	          <p>A free and open source Bootstrap 4 admin template</p>
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	        </ul>
      </div>

       {{-- create form --}}
        <div class="row">
	      <div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4>Category Create Form</h4>
			        	<form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" class="mt-3">
			        		@csrf
				        	<div class="form-group">
				        		<label for="categoryName">Category Name</label>
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
			        			<input type="submit" name="createBtn" class="btn btn-success" value="Add">
			        		</div>
		        		</form>
					</div>
				</div>
			</div>
		</div>



</main>



@endsection