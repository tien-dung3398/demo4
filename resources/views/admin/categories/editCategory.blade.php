@extends('admin.index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật danh mục 
                        </header>
                        <div class="panel-body">
                            @foreach($category as  $value)
                            <div class="position-center">
                            <form role="form" action="{{route('category.update',['id' => $value->id])}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$value->name}}"  name="name" class="form-control"  >
                                    <p style="color:red"> {{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc"  >{{$value->desc}}</textarea>
                                    <p style="color:red"> {{$errors->has('desc') ? $errors->first('desc') : ''}}</p>
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
            </div>
@endsection