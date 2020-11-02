@extends('admin.index')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">          
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <form action="{{route('user.index',['ac' =>'search'])}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('get')
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search" name="text">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Go!</button>
          </span>
        </form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
         @if(session()->has('mess'))
           <p style="color: red">{{session()->get('mess')}}</p>
         @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên user</th>
            <th>Email</th>
            <th>Password</th>
            <th>Admin</th>
            <th>Author</th>
            <th>User</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $key => $user)
          <form action="{{route('user.update',['id'=>$user->id])}}" method="POST">
            @csrf
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email }} <input type="hidden" name="admin_email" value=""></td>
              <td style="width:150px;display:flex;overflow: hidden">{{ $user->password }}</td>
              @foreach ($roles as $item)
              @if($id[$user->id] == $item->id)
               <td><input type="checkbox" value="{{$item->id}}" name="author" checked ></td>
              @else
                <td><input type="checkbox" value="{{$item->id}}" name="author"  ></td>
             @endif
              @endforeach
            <td>
               <input type="submit" value="Assign roles" class="btn btn-sm btn-default">
               <a href="{{route('user.delete',['id' => $user->id])}}" data-toggle="modal" class="btn btn-danger" style="margin-top:5px; width:90px">
                Delete
            </a>
            </td> 
            </tr>
          </form>
        @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection