@extends('user.layout.master')
@section('title','User Profile')
@section('content-section')

<style>
  .pname{
    width: 200px;
    height: 100px;

  }
  .pname p{
    text-align: center;
  }
  
  .pname span{
    text-align: center;
  }
  
</style>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div style="position: absolute;" class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>My Profile</li>
        </ol>
    </div>
    </section>

    </section><!-- End Breadcrumbs -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio mt-5">
      <div class="container">
        <div class="pname">
        <img style="border-radius: 50%;" src="{{asset('user/assets/img/about.jpg')}}" alt="" height="100" width="100">
        <p >Ramesh Baduwal</p>

        </div>
      </div>

    </section><!-- End Portfolio Section -->
        <div class="pname">
        <a href="{{ route('editprofile') }}"><span>Edit Information</span></a>
        </div>

    <!-- ======= Clients Section ======= -->
      <section style="margin-left:10px;" id="contact" class="contact">
      <div class="container">
<div class="col-lg-6">
          @if(Session::has('msg'))
          <div class="alert alert-success">
          {{Session::get('msg')}}
          </div>
          @endif
            <form style="height:400px;" action="{{route('updateprofile',$profile->id)}}" method="POST" class="php-email-form">
            @csrf
              <div class="row">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="fname" id="subject" placeholder="First Name" value="{{$profile->first_name}}" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="lname" id="subject" placeholder="Last Name" value="{{$profile->last_name}}" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="email" id="subject" placeholder="Your Email" value="{{$profile->email}}" required>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="Your password" value="{{$profile->password}}" required>
              </div>
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div style="float:left; margin-left:10px;" class="text-center"><button type="submit">Update data</button></div>
              
            </form>
          </div>
</div>
</section>  

  </main><!-- End #main -->


@endsection