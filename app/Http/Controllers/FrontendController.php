<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Item;

class FrontendController extends Controller
{
	public function index($value = ''){
		$items = Item::all();
		$categories = Category::all();
		$subcategories = Subcategory::all();
		$brands = Brand::all();
	   	return view('frontend.index', compact('items','categories','subcategories', 'brands'));
	}

	public function cart($value = ''){
		return view('frontend.shoppingcart');
	}

	public function login($value = ''){
		return view('frontend.login');
	}

	public function register($value = ''){
		return view('frontend.register');
	}

	public function orderhistory($value = ''){
		return view('frontend.orderhistory');
	}

	public function categories($id){
		// dd($id);
		$titleCategories = Category::find($id);
		$categories = Category::all();
		$subcategories = Subcategory::where('category_id','=',$id)->get();
		// dd($categories);
		$items = Item::orderby('id','desc')->get();		
		$brands = Brand::all();
		return view('frontend.category', compact('items','categories','subcategories', 'brands','titleCategories'));
	}

}
