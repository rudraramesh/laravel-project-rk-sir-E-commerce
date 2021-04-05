@extends('user.layout.master')
@section('title','product details')
@section('content-section')


 <main id="main">


    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{asset('admin/upload/products')}}/{{$details->product_image}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="">{{$details->product_name}}</a>
              </h2>

                <a href="">Price: {{$details->product_price}}</a>
              </h6>

              <h6 class="">
                <a href="">Quantity:{{$details->product_quantity}}</a>
              </h6>

             

              <div class="entry-content">

                <h3>Description</h3>
                <p>
                  {{$details->product_description}}
                </p>
                <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">

              </div>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">{{Auth::user()->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$details->created_at}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-comments">

              <h4 class="comments-count">ALL Comments</h4>

              <div id="comment-2" class="comment">
                <div class="d-flex">
              	 @foreach($showcomment as $comment) 

                  <div class="comment-img"><img src="" alt=""></div>
                  <div>
                    <h5><a href="">{{$comment->your_name}}</a> <a href="" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">{{$comment->created_at}}</time>
                    <p>
                      {{$comment->your_comment}}
                    </p>
                  </div>
                </div>

                <div id="comment-reply-1" class="comment comment-reply">

                {{--   <div id="comment-reply-2" class="comment comment-reply">
                    <div class="d-flex">
                      <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                      <div>
                        <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                        <time datetime="2020-01-01">01 Jan, 2020</time>
                        <p>
                          Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                        </p>
                      </div>
                    </div>

                  </div> --}}<!-- End comment reply #2-->
             @endforeach 

                </div><!-- End comment reply #1-->
              </div><!-- End comment #2-->

              <div class="reply-form">
                <h4>Add a Comment</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                @if(Session::has('msg'))
                <div class="alert alert-success">
                	{{Session::get('msg')}}
                </div>
                @endif
                <form action="{{ route('storeproductcomment') }}" method="POST">
                	@csrf
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Post Comment</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{route('searchproduct')}}">
                	@csrf
                  <input type="text" name="search" placeholder="search product">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
              	@foreach($categorys as $ct)

                  <li><a href="{{route('productbycategory',$ct->id)}}">{{$ct->category_name}} <span>({{$ct->products_count}})</span></a></li>
                @endforeach
                  
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Archive Post</h3>
              <div class="sidebar-item recent-posts">
              	@foreach($recent as $r)
                <div class="post-item clearfix">
                  <img src="{{asset('admin/upload/products')}}/{{$r->product_image}}" alt="">
                  <h4><a href="{{ route('productdetails',[$r->id]) }}">{{$r->product_name}}</a></h4>
                  <time datetime="2020-01-01">{{$r->created_at}}</time>
                </div>

                

               @endforeach
                


              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              @foreach($showtags as $tag)
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">{{$tag->tags_name}}</a></li>
                </ul>
              </div><!-- End sidebar tags-->
              @endforeach

            </div><!-- End sidebar -->
          </div><!-- End blog sidebar -->
        </div>
      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

@endsection