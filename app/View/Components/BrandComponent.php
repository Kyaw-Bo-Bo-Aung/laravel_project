<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Brand;


class BrandComponent extends Component
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
        $brands = Brand::all();

        return view('components.brand-component',compact('brands'));
    }
}
