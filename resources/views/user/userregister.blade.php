@extends('user.layout.master')
@section('title','User-Register')
@section('content-section')


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>My Account</li>
        </ol>
        <h2>Register</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section style="margin-left:400px;" id="contact" class="contact">
      <div class="container">
<div class="col-lg-6">
          @if(Session::has('msg'))
          <div class="alert alert-success">
          {{Session::get('msg')}}
          </div>
          @endif
            <form style="height:400px;" action="{{route('storeregister')}}" method="POST" class="php-email-form">
            @csrf
              <div class="row">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="fname" id="subject" placeholder="First Name" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="lname" id="subject" placeholder="Last Name" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="email" id="subject" placeholder="Your Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="Your password" required>
              </div>
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div style="float:left; margin-left:10px;" class="text-center"><button type="submit">Register</button></div>
              <a style="float:right;margin-right:50px;color:green; padding-top:10px;" href="#">already register Login</a>
            </form>
          </div>
</div>
</section>

@endsection