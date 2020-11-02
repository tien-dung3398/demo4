<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\EditProduct;
use App\Models\Product_image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories  = Product::with('category')->distinct()->get(['category_id']);
        $products  = Product::with('category')->with(['images', 'brand:id,name'])->get();
        return view('admin.products.allProduct', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands     = Brand::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.products.addProduct', compact('categories', 'brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {
        $product              = new Product;
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;
        $product->desc        = $request->desc;
        $product->category_id = $request->category;
        $product->brand_id    = $request->brand;
        $product->status      = $request->status;
        $product->save();

        if ($request->file('img')) {
            foreach ($request->file('img') as $img) {
                $name_img       = $img->getClientOriginalName();
                $name           = current(explode('.', $name_img));
                $new_img        = rand(0, 99) . $name . '.' . $img->extension();
                $path           = public_path('uploads/');
                $img->move($path, $new_img);
                $product_images = new Product_image;
                $product_images->fill([
                    'img'        => $new_img,
                    'product_id' => $product->id,
                ]);
                $product_images->save();
            }
        }
        if (empty($request->file('img'))) {
            $product_images = new Product_image;
            $product_images->fill([
                'img'        => '',
                'product_id' => $product->id,
            ]);
            $product_images->save();
        }
        return redirect()->back()->with('mess', 'Thêm sản phẩm thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $img = Product_image::where('product_id', $request->id)->get();
        return view('admin.products.show', compact('img'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $categories  = Category::all();
        $brands      = Brand::all();
        $product     = Product::where('id', $request->id)->get();
        return view('admin.products.editProduct', compact('product', 'categories', 'brands'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProduct $request)
    {
        $product = Product::query()->find($request->id);
        $path    =  public_path('uploads/');
        if (file_exists($path . $product->img) && $request->file('img') != NULL) {
            unlink($path . $product->img);
        }
        if (!empty($request->file('img'))) {
            $name_img = $request->file('img')->getClientOriginalName();
            $name     = current(explode('.', $name_img));
            $new_img  = rand(0, 99) . $name . '.' . $request->file('img')->extension();
            $request->file('img')->move($path, $new_img);
        }
        $img = $new_img ?? $product->img;
        $product->where('id', $request->id)->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'img'         => $img,
            'desc'        => $request->desc,
            'category_id' => $request->category,
            'brand_id'    => $request->brand,
            'status'      => $request->status
        ]);
        return redirect()->route('product.index')->with('mess', 'Cập nhập thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct(Request $request)
    {
        $product = Product::query()->find($request->id);
        $path    =  public_path('uploads/');
        if (file_exists($path . $product->img) && $product->img != NULL) {
            unlink($path . $product->img);
        }
        $product->destroy($request->id);
        return redirect()->back()->with('mess', 'Xóa Thành công');
    }
}
