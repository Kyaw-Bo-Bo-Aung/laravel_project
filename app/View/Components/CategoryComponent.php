<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Item;

class CategoryComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $items = Item::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();

        return view('components.category-component',compact('items','categories','subcategories', 'brands'));
    }
}
