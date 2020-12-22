@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Subcategory</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Subcategory</a></li>
        </ul>
      </div>

      <div class="row">
	      	<div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4 class="d-inline-block">Category List</h4>
			            <a href="{{route("subcategories.create")}}" class="btn btn-success float-right">Add Subcategory</a>
							<table class="table table-bordered mt-3">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Subcategory Name</th>
										<th>Category Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $j=1; @endphp
									@foreach ($subcategories as $subcategory)
									<tr>
										<td>{{$j++}}</td>
										<td>{{$subcategory->name}}</td>
										<td>{{$subcategory->category->name}}</td>
										<td><a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-outline-warning">edit</a>

											<form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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
</main>



@endsection