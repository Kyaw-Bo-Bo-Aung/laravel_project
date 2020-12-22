@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
	        <div>
	          <h1><i class="fa fa-dashboard"></i> Edit Brand</h1>
	          <p>A free and open source Bootstrap 4 admin template</p>
	        </div>
	        <ul class="app-breadcrumb breadcrumb">
	          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          <li class="breadcrumb-item"><a href="#">Brand</a></li>
	        </ul>
      </div>

       {{-- create form --}}
        <div class="row">
	      <div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4>Edit Form</h4>
			        	<form method="POST" action="{{route('brands.update',$brand->id)}}" enctype="multipart/form-data" class="mt-3">
			        		@csrf
			        		@method('PUT')
				        	<div class="form-group">
				        		<label for="brandName">Brand Name</label>
				        		<input type="text" name="name" id="brandName" class="form-control @error ('name')is-invalid @enderror" value="{{$brand->name}}">
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

								  	<img src="{{$brand->photo}}" width="200">
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
			        			<input type="submit" name="updateBtn" class="btn btn-success" value="Update">
			        		</div>
		        		</form>
					</div>
				</div>
			</div>
		</div>



</main>



@endsection