@extends('user.layout.master')
@section('title','user-login')
@section('content-section')


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>My Account</li>
        </ol>
        <h2>Login</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section style="margin-left:400px;" id="contact" class="contact">
      <div class="container">
<div class="col-lg-6">
          @if(Session::has('error'))
          <div class="alert alert-danger">
          {{Session::get('error')}}
          </div>
          @endif
            <form style="height:400px;" action="{{route('userlogincheck')}}" method="POST" class="php-email-form">
            @csrf
              <div class="row">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="email" id="subject" placeholder="Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="subject" placeholder="password" required>
              </div>
              
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div style="float:left; margin-left:10px;" class="text-center"><button type="submit">Login</button></div>
              <a style="float:right;margin-right:50px;color:green; padding-top:10px;" href="{{route('userregister')}}">Create a New Account</a>
            </form>
          </div>
</div>
</section>

@endsection