@extends('admin.index')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Chi tiết sản phẩm
      </header>
      <div class="content">
        <div class="left">
          <p>Đặc điểm nổi bật của sản phẩm</p>

          <!-- Swiper -->
          <div class="swiper-container">
            <div class="swiper-wrapper">
              @foreach ($img as $item)
              <div class="swiper-slide"><img src="{{asset('public/uploads/'.$item->img)}}"></div>
              @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <!-- Add Pagination -->
          <!-- Add Arrows -->

          <!-- Swiper JS -->

        </div>
        <div class="right">
          <p>Thông số kĩ thuật </p>
          <div class="specifications">
            <div class="thongso">
              <p>Màn hình:</p>
              <p>Hệ điều hành:</p>
              <p>Camera sau:</p>
              <p>Camere trước</p>
              <p>CPU</p>
              <p>RAM</p>
              <p>Bộ nhớ</p>
            </div>
            <div class="thongtin">
              <p style="color: #288ad6;;">Màn hình:</p>
              <p style="color: #288ad6;;">Hệ điều hành:</p>
              <p>Camera sau:</p>
              <p>Camere trước</p>
              <p style="color: #288ad6;;">CPU</p>
              <p>RAM</p>
              <p style="color: #288ad6;;">Bộ nhớ</p>
            </div>
          </div>
          <button type="submit" name="add_category_product" class="btn btn-info">Cập nhập thông tin</button>
        </div>
      </div>
    </section>
  </div>
  <script src="../package/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
  @endsection