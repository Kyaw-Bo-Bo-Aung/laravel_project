<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderby('id','desc')->get();
        return view('backend.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if ($request) {
            $order = new Order;
            $order->orderdate = date('Y-m-d');
            $order->user_id = Auth::id();
            $order->total = $request->total;
            $order->orderno = uniqid();
            $order->note = $request->notes;
            $order->save();

            $items = json_decode($request->items);

            foreach ($items as $row) {
               $order->items()->attach($row->id,['qty'=>$row->qty]);
            }

            return "order successful";
        }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view ('backend.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
       
        $order->status = 1;
        $order->save();

        return redirect()->route('orders.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // $order->status = 2;
        // $order->save();

        // return redirect()->route('orders.index');
    }

     public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        return redirect()->route('orders.index');
    }
}
