@extends('admin.index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thương hiệu sản phẩm
                        </header>
                        @if(session()->has('mess'))
                          <p style="color:red">{{session()->get('mess')}}</p> 
                        @endif
                        <div class="panel-body">
                            @foreach($brand as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{route('brand.update',['id'=>$value->id])}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$value->name}}"  onkeyup="ChangeToSlug();" name="name" class="form-control" id="slug" >
                                    <p style="color:red"> {{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc" id="exampleInputPassword1" >{{$value->desc}}</textarea>
                                    <p style="color:red"> {{$errors->has('desc') ? $errors->first('desc') : '' }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="status" class="form-control input-sm m-bot15">
                                          @if($value->status == 0)
                                            <option value="0" selected>Hiện</option>
                                            <option value="1">Ân</option>
                                          @else
                                            <option value="0" >Hiển thị</option>
                                            <option value="1" selected >Ẩn</option>
                                          @endif
                                            
                                    </select>
                                </div>
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật danh mục</button>
                                </form>
                            </div>
                            @endforeach 
                             
                          {{--   <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_brand_product->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" value="{{$edit_brand_product->brand_slug}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{$edit_brand_product->brand_desc}}</textarea>
                                </div>
                               
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật danh mục</button>
                                </form>
                            </div> --}}
                           
                        </div>
                    </section>

            </div>
@endsection