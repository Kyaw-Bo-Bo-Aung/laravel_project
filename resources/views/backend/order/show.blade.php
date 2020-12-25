@extends('backend.backend_master')
@section('content')
	<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
          <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> LOGO</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: {{$order->orderdate}}</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>LOGO Co. Ltd</strong><br>518 University Avenue Road<br>Yangon<br>Email: hello@LOGO.com</address>
                </div>
                <div class="col-4">To
                  <address><strong>{{$order->user->name}}</strong><br>{{$order->user->email}}</address>
                </div>
                <div class="col-4"><b>Order ID:</b> {{$order->orderno}}</div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($order->items as $item)
                    @php
                    	$qty = $item->pivot->qty;
                    	$subtotal = $qty*$item->price;
                    @endphp
                      <tr>
                        <td>{{$qty}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}} <b>Ks</b></td>
                        <td>{{$item->description}}</td>
                        <td>{{$subtotal}} <b>Ks</b></td>
                      </tr>
                    @endforeach
                 
                    </tbody>
                    <tfoot class="bg-dark text-white">
                    	<tr>
                    		<td></td>
                    		<td colspan="3"><big><b>All total</b></big></td>
                    		<td><big>{{$order->total}} <b>Ks</b></big></td>
                    	</tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
              	@if($order->status == 0)
              	<form action="{{route('orders.update',$order->id)}}" method="post">
              		@csrf
              		@method('PUT')
              		<button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Confirm</button>
              	</form>
                <a href="{{route('cancel',$order->id)}}" class="btn btn-danger">Cancel</a>
              	
              	@elseif($order->status == 1 || $order->status == 2)
              	<a href="{{route('orders.index')}}" class="btn btn-primary">OK</a>
               @endif
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
















@endsection