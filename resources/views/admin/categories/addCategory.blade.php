@extends('admin.index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục 
                        </header>
                        @if(session()->has('mess'))
                            <p style="color:red"> {{session()->get('mess')}}</p>
                        @endif
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{route('category.store')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text"  class="form-control"   name="name"   placeholder="danh mục" value="{{old('name')}}" >
                                <p style="color:red"> {{$errors->has('name') ? $errors->first('name') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="desc"  placeholder="Mô tả danh mục">{{old('desc')}}</textarea>
                                    <p style="color:red"> {{$errors->has('desc') ? $errors->first('desc') : ''}}</p>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                                </form>
                            </div>

                        </div>
                    </section>
            </div>
@endsection