<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::orderby('id','desc')->get();
        return view('backend.subcategory.index',compact("subcategories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();     
       return view('backend.subcategory.create',compact("categories"));
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

       
        // dd($category_id, $subcategory_name);
        $request->validate([
            'subcategoryName'=> 'required',
        ]);
        $category_id = $request->categoryId;
        $subcategory_name = $request->subcategoryName;

        $subcategory = new Subcategory;
        $subcategory->name = $subcategory_name;
        $subcategory->category_id = $category_id;
        $subcategory->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        // dd($subcategory);
        // dd($subcategory->name, $subcategory->category_id, $subcategory->id);
         $categories = Category::all();
        return view('backend.subcategory.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
         $request->validate([
            'name'=> 'required',
        ]);
        $category_id = $request->categoryId;
        $subcategory_name = $request->name;

        $subcategory->name = $subcategory_name;
        $subcategory->category_id = $category_id;
        $subcategory->save();

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategories.index');
    }
}
