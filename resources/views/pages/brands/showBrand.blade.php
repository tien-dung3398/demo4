@extends('layout')
@section('main')
<div class="features_items"><!--features_items-->
       @foreach($show as $value)
                        <h2 class="title text-center">  Thuơng hiệu{{' '.$value->name}}</h2>
                        @foreach($value->product as  $product)
                        @if($product->status == 0)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                                <img src="{{asset('public/uploads/'.$product->img)}}" alt="" />
                                                <h2>{{number_format($product->price)}}.VNĐ</h2>
                                                <p>{{$product->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                         <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{number_format($product->price)}}.VNĐ</h2>
                                                <p>{{$product->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>                      
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div><!--features_items-->
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                      </ul>
        @endforeach
        <!--/recommended_items-->
@endsection