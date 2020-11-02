<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        $products    = Product::all();
        return view('pages.home', compact('products', 'categories', 'brands'));
    }

    /* CATEGORY */

    public function category(Request $request)
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        $show        = Category::where('id', $request->category)->get();
        return view('pages.categories.showcategory', compact('show', 'categories', 'brands'));
    }
    public function brand(Request $request)
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        $show        = Brand::where('id', $request->brand)->get();
        return view('pages.brands.showbrand', compact('show', 'categories', 'brands'));
    }
}
