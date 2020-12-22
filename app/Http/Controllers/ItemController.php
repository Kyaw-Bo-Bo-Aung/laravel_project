<?php

namespace App\Http\Controllers;

use App\Item;
use App\Subcategory;
use App\Brand;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderby('id','desc')->get();
        return view('backend.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view ('backend.item.create',compact('brands','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'photo'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'discount'=>'required'
        ]);
         // dd($request->name,$request->price,$request->photo,$request->description,$request->brandId,$request->subcategoryId);

        if ($request->file()) {
           
            $filename = time().'_'.$request->photo->getClientOriginalName();

            //itemimg/09098212_apple.jpg
            $filepath = $request->file('photo')->storeAs('itemimg', $filename, 'public');
            // dd($filepath);
            $path = '/storage/'.$filepath;

        }

        $item = new Item;
        $item->photo=$path;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->subcategory_id = $request->subcategoryId;
        $item->brand_id = $request->brandId;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // dd($item->id);
        $brands = Brand::all();
        // dd($brands->id,$item->brand_id);
        $subcategories = Subcategory::all();
        // dd($item->id);
        return view('backend.item.edit',compact('item','brands','subcategories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
         $request->validate([
            'name'=>'required',
            'price'=>'required',
            'photo'=>'sometimes|mimes:jpg,jpeg,png',
            'description'=>'required',
            'discount'=>'required'
        ]);
            // \File::delete(public_path())
           // dd(public_path('/itemimg/'));
        if ($request->file()) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            //categoryimg/738247927_a.jpg
            $filepath = $request->file('photo')->storeAs('itemimg', $filename, 'public');
            // (/storage/categoryimg/738247927_a.jpg)
            $path = '/storage/'.$filepath;
            // dd($filepath,$path,$request->file());

            $item->photo=$path;
        }

        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->subcategory_id = $request->subcategoryId;
        $item->brand_id = $request->brandId;
        $item->save();

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
       return redirect()->route('items.index');
    }
}

    

    

