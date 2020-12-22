@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Brand</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Brand</a></li>
        </ul>
      </div>

	<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            	<div class="mb-3">
            		<h4 class="d-inline-block">Brand List</h4>
	            	<a href="{{route("brands.create")}}" class="btn btn-success float-right">Add Brand</a>
            	</div>

					<div class="table-responsive">
						<div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Photo</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@php $j=1; @endphp
											@foreach ($brands as $brand)
											<tr>
												<td>{{$j++}}</td>
												<td>{{$brand->name}}</td>
												<td><img src="{{asset($brand->photo)}}" width="100"></td>
												<td><a href="{{route('brands.edit',$brand->id)}}" class="btn btn-outline-warning">edit</a>

													<form method="post" action="{{route('brands.destroy',$brand->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
											        @csrf
											        @method('DELETE')
											        <input type="submit" name="deleteBtn" class="btn btn-outline-danger" value="Delete">
											      </form>

												</td>
											</tr>
											@endforeach
										</tbody>
				                	</table>
				            	</div>
				        	</div>
				    	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>



@endsection