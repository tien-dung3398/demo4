@extends('admin.index')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục 
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">            
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
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
            <th>Tên danh mục</th>
            <th>Mô Tả</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $key => $category)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $category->name}}</td>
            <td>{{$category->desc}} </td>
            <td>
            <a href="{{route('category.edit',['id'=> $category->id])}}" class="active styling-edit">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{route('category.delete',['id'=>$category->id])}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-----import data---->
     <!-- <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
        <input type="file" name="file" accept=".xlsx"><br>

       <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
      </form> !-->

    <!-----export data---->
      <!-- <form action="{{url('export-csv')}}" method="POST">
          @csrf
       <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
      </form>!-->
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