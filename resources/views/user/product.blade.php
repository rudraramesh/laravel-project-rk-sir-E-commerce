@extends('user.layout.master')
@section('title','Product')
@section('content-section')


<style>
  .img{
    height: 400px;
    width:100%;
  }
  .portfolio-wrap{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  }
</style>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div style="position: absolute;" class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Product</li>
        </ol>
    </div>
    </section>

      <div style="margin-left:500px; " class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8 entries">
          <div class="col-lg-4">

        <div class="sidebar">

              <div class="sidebar-item search-form">
                <form action="{{route('searchproduct')}}">
                  @csrf
                  <input type="text" name="search" placeholder="search product">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
     

    </section><!-- End Breadcrumbs -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio mt-5">
      <div class="container">

        <div class="row portfolio-container">
                  @foreach($showproduct as $product)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{asset('admin/upload/products')}}/{{$product->product_image}}" class="img-fluid img" alt="">
              <div class="portfolio-info">
                <h4>{{$product->product_name}}</h4>
                <p>
                   {{Str::limit($product->product_description, $limit = 100)}} 
                </p>
                <div class="portfolio-links">
                  <a href="{{asset('admin/upload/products')}}/{{$product->product_image}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$product->product_name}}"><i class="bx bx-plus"></i></a>
                  <a href="{{ route('productdetails',[$product->id]) }}" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
         @endforeach
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Clients</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="clients-slider swiper-container">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-2.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-3.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-4.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-5.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-6.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-7.png')}}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{asset('user/assets/img/clients/client-8.png')}}" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->


@endsection