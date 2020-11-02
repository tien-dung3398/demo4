<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\AddBrandRequest as AddBrand;
use App\Http\Requests\EditBrandRequest as EditBrand;
use App\Models\Product;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.allBrand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.addBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBrand $request)
    {
        $brand = new Brand;
        $brand->fill([
            'name'    => $request->name,
            'desc'    => $request->desc,
            'status'  => $request->status
        ]);
        $brand->save();
        return redirect()->back()->with('mess', 'Thêm thương hiệu thành công');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::where('id', $id)->get();
        return view('admin.brands.editBrand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBrand $request)
    {
        Brand::where('id', $request->id)->update([
            'name'   => $request->name,
            'desc'   => $request->desc,
            'status' => $request->status
        ]);
        return redirect()->route('brand.index')->with('mess', 'Cập nhập thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Brand::destroy($request->id);
        return redirect()->back()->with('mess', 'Xóa thành công');
    }
}
