@extends('backend.backend_master')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Order List</a></li>
        </ul>
      </div>

       <div class="row">
	      	<div class="col-md-12">
	        	<div class="tile">
	          		<div class="tile-body">
			            <h4 class="d-inline-block">Order List</h4>
			            
							<table class="table table-bordered mt-3">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Orderno</th>
										<th>Orderdate</th>
										<th>Customer's name</th>
										<th>Total Cost</th>
										<th>status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php 
									$j=1; 
									@endphp
									@foreach($orders as $order)
										
									<tr>
										<td>{{$j++}}</td>
										<td>{{$order->orderno}}</td>
										<td>{{$order->orderdate}}</td>
										<td>{{$order->user->name}}</td>
										<td>{{$order->total}} <b>Ks</b></td>
										<td>
											@if($order->status==0)
											<p class="text-white d-inline-block bg-warning rounded-pill py-1 px-2">Pending</p>
											@elseif($order->status==1)
											<p class="text-white d-inline-block bg-success rounded-pill py-1 px-2">success</p>
											@elseif($order->status==2)
											<p class="text-white d-inline-block bg-danger rounded-pill py-1 px-2">cancel</p>
											@endif
										</td>
										<td><a href="{{route('orders.show',$order->id)}}" class="btn btn-info">detail</a></td>
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