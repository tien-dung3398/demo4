@extends('admin.index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật sản phẩm
                        </header>
                        @if(session()->has('mess'))
                           <p style="color:red"> {{session()->get('mess')}}</p>
                        @endif
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($product as $key => $value)
                                <form role="form" action="{{route('product.update',['id' => $value->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control"  value="{{$value->name}}">
                                    <p style="color:red"> {{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input type="text"  name="quantity" class="form-control"  value="{{$value->quantity}}">
                                    <p style="color:red"> {{$errors->has('quantity') ? $errors->first('quantity') : ''}}</p>
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" value="{{$value->price}}" name="price" class="form-control" id="exampleInputEmail1" >
                                    <p style="color:red"> {{$errors->has('price') ? $errors->first('price') : ''}}</p>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="img" class="form-control" id="exampleInputEmail1">
                                    <img src="{{asset('public/uploads/'.$value->img)}}" height="100" width="100" >
                                    <p style="color:red"> {{$errors->has('img') ? $errors->first('img') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc" id="ckeditor2"  > {{$value->desc}} </textarea>
                                    <p style="color:red"> {{$errors->has('desc') ? $errors->first('desc') : ''}}</p>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="category" class="form-control input-sm m-bot15">
                                        @foreach ($categories as $category)
                                         @if($category->id == $value->category_id)
                                        <option selected  value="{{$category->id}}">{{$category->name}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                      <select name="brand" class="form-control input-sm m-bot15">
                                        @foreach ($brands as $brand)
                                        @if($brand->id == $value->brand_id)
                                       <option selected value="{{$brand->id}}">{{$brand->name}}</option>
                                       @else
                                       <option value="{{$brand->id}}">{{$brand->name}}</option>
                                       @endif
                                       @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="status" class="form-control input-sm m-bot15">
                                       @if($value->status == 0)
                                       <option selected value="0"> Hiện</option>
                                       <option value="1">Ẩn</option>
                                       @else{
                                        <option selected value="1">Ẩn</option>
                                        <option value="0">Hiện</option>
                                       }
                                       @endif
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection