@extends('admin.index')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
      <form action="{{route('product.index')}}" method="post" enctype="multipart/form-data">
        @method('get')
        <div class="row w3-res-tb">
          @csrf
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle " name="select">
              <option selected value="" >--Thương hiệu--</option>
              @foreach ($categories as $item)
            <option value="">{{$item->category->name}}</option>
              @endforeach
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search" name="search_text">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </form>
    <div class="table-responsive">
      @if(session()->has('mess'))
          <p style="color:red"> {{session()->get('mess')}}</p>
      @endif
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $key => $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ number_format($product->price,0,',','.') }}đ</td>
            @foreach($product->images as $val)
              <td><img src="{{asset('public/uploads/'.$val->img)}}" height="100" width="100"></td>
            @endforeach
            <td>{{ $product->category->name}}</td>
            <td>{{ $product->brand->name }}</td>
            <td><span class="text-ellipsis">
               {{($product->status == 0) ? 'Hiện' : 'Ẩn'}}
            </span></td>
            <td>
              <a href="{{route('product.edit',['id' => $product->id])}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{route('product.delete',['id' => $product->id])}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
                <a href="{{route('product.show',['id' => $product->id])}}" class="active styling-edit" ui-toggle-class=""><i class="fas fa-eye"></i></a>
              </a>
            </td>
          </tr>
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