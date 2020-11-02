@extends('admin.index')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm user
                        </header>
                        @if(session()->has('mess'))
                          <p style="color:red"> {{session()->get('mess')}}</p>
                        @endif
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{route('user.store')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên users</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                   <p style="color:red">{{$errors->has('name') ? $errors->first('name') : ''}}</p> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                    <p style="color:red">{{$errors->has('email') ? $errors->first('email') : ''}}</p> 
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                                    <p style="color:red">{{$errors->has('password') ? $errors->first('password') : ''}}</p> 
                                </div>
                                <select name="role" class="form-control input-sm m-bot15">
                                    @foreach($roles as $role)
                                       <option value="{{$role->id}}">{{$role->name}}</option>    
                                    @endforeach                    
                                </select>
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm users</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection