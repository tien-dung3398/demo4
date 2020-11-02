<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\EditCategory;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.allCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('admin.categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     */
    public function store(CreateCategory $request)
    {
        $category       = new Category;
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return redirect()->back()->with('mess', 'Thêm sản phẩm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function edit(Request $request)
    {
        $category = Category::where('id', $request->id)->get();
        return view('admin.categories.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(EditCategory $request)
    {
        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'desc' => $request->desc
        ]);
        return redirect()->route('category.index')->with('mess', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Request $request)
    {
        $category = Category::where('id', $request->id)->get();
        foreach ($category as $value) {
            if ($value->hasProduct($value->id)) {
                Product::where('category_id', $value->id)->delete();
            }
        }
        Category::destroy($request->id);
        return redirect()->back()->with('mess', 'Xóa thành công');
    }
}
