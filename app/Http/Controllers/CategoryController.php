<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id','desc')->get();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
        $request->validate([
            'name'=>'required|min:2',
            'photo'=>'required|mimes:jpeg,jpg,png'
        ]);

        // upload
        if ($request->file()) {
            //738247927_a.jpg 
            // နာမည် မထပ်အောင်လို့
            $filename = time().'_'.$request->photo->getClientOriginalName();

            //categoryimg/738247927_a.jpg
            $filepath = $request->file('photo')->storeAs('categoryimg', $filename, 'public');

            // (/storage/categoryimg/738247927_a.jpg)
            $path = '/storage/'.$filepath;
        }

        // Store
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();

        // redirect
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|min:2',
            'photo' => 'mimes:jpeg,jpg,png'
        ]);

        if ($request->file()) {
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('categoryimg', $filename, 'public');
            $path = '/storage/'.$filepath;

        // delete old file in storage
        // $destinationPath = 'your_path';
        // File::delete($destinationPath.'/your_file');
        
        $category->photo = $path;
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
       
        return redirect()->route('categories.index');
    }
}
