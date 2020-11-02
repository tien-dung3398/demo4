@extends('admin.index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            @if(session()->has('mess'))
                               <p style="color:red"> {{session()->get('mess')}}</p>
                            @endif
                            <div class="position-center">
                                <form role="form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text"  name="name" class="form-control "  placeholder="Tên danh mục" value="{{old('name')}}"> 
                                    <p style="color:red"> {{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input type="text"  name="quantity" class="form-control" placeholder="Điền số lượng" value="{{old('quantity')}}">
                                    <p style="color:red"> {{$errors->has('quantity') ? $errors->first('quantity') : ''}}</p>
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text"  name="price" class="form-control"  placeholder="Tên danh mục" value="{{old('price')}}">
                                    <p style="color:red"> {{$errors->has('price') ? $errors->first('price') : ''}}</p>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="img[]" class="form-control" value="{{old('img')}} " multiple>
                                    <p style="color:red"> {{$errors->has('img') ? $errors->first('img') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="desc" id="ckeditor1" placeholder="Mô tả sản phẩm">{{old('desc')}}</textarea>
                                    <p style="color:red"> {{$errors->has('desc') ? $errors->first('desc') : ''}}</p>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="category" class="form-control input-sm m-bot15">
                                    @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                      <select name="brand" class="form-control input-sm m-bot15">
                                        @foreach($brands as $brand)
                                           <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="status" class="form-control input-sm m-bot15">
                                         <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection