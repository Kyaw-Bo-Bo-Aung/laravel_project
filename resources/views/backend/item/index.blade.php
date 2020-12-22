@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Item</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Item</a></li>
        </ul>
      </div>

       <div class="row">
	      	<div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4 class="d-inline-block">Item List</h4>
			            <a href="{{route("items.create")}}" class="btn btn-success float-right">Add Item</a>
							<table class="table table-bordered mt-3">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Subcategory</th>
										<th>Photo</th>
										<th>Price</th>
										<th>Brand</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $j=1; @endphp
									@foreach ($items as $item)
									<tr>
										<td>{{$j++}}</td>
										<td>{{$item->name}}</td>
										<td>{{$item->subcategory->name}}</td>
										<td><img src="{{asset($item->photo)}}" width="100"></td>
										<td>{{$item->price}}</td>
										<td>{{$item->brand->name}}</td>
										<td>
											<a href="{{route('items.show',$item->id)}}" class="btn btn-outline-info">detail</a>

											<a href="{{route('items.edit',$item->id)}}" class="btn btn-outline-warning">edit</a>



											<form method="post" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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