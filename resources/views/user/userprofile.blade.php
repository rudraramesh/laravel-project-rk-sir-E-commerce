@extends('user.layout.master')
@section('title',$show->name)
@section('content-section')

<style>
	.imgs{
		height:100px;
		width: 100px;
		position: absolute;
		margin-top: 130px;
		margin-left: 20px;
		border-radius: 50%;
	}
	.cover{
		height: 200px;
		width: 450px;
		border-radius: 10px;
	}
</style>
 <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">User Details</a></li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-lg-7" data-aos="fade-right">
              <h3>{{$show->name}}</h3>
              <div class="col-lg-8">
              	 @if($show->profiles()->count()==0)

              <img src="{{asset('user/image/avatar.png')}}" alt="" class="img-fluid imgs">
              <button class="btn btn-info"><a href="#staticBackdropProfile" data-bs-toggle="modal" data-bs-target="#staticBackdropProfile"> Complete Profile</a></button>
               @else  
              <img src="{{asset('user/upload/profileimage')}}/{{$show->profiles->profile_image}}" alt="" class="img-fluid imgs">
              <button style="font-size: 15px; float: right; margin-top: 10px;" class="btn btn-info"><a style="float: right;" href="{{route('editprofile',$show->id)}}"> Update Profile</a></button> 

             
                 <img src="{{asset('user/image/myphotos.png')}}" alt="" class="img-fluid imgs">
              <button class="btn btn-info"><a href="#staticBackdropProfile" data-bs-toggle="modal" data-bs-target="#staticBackdropProfile"> Complete Profile</a></button>

              <img src="{{asset('user/upload/coverimage')}}/{{$show->profiles->cover_image}}" alt="" class="img-fluid cover">
                <button style="font-size: 15px; float: right; margin-top: 10px;" class="btn btn-info"><a style="float: right;" href="{{route('editprofile',$show->id)}}"> Update Profile</a></button> 
               <p>
              	<li style="list-style: none; border:0.3px solid #ccffcc; margin-top: 50px; line-height: 2em;"><strong>About Me</strong>:{{$show->profiles->bio}}</li></p>
               @endif 

          </div>

          </div>

         

          <div class="col-lg-5 col-md-6">
            <div class="info-box  mb-4" data-aos="fade-left">
              <h3>User Information</h3>
              {{-- <p>+1 5589 55488 55</p> --}}
              <ul>
              	<li style="list-style: none;"><strong>Name</strong>:{{$show->name}}</li>&nbsp;
              	<li style="list-style: none;"><strong>email</strong>:{{$show->email}}</li>&nbsp;
                @if($show->profiles()->count()!=0)
              	<li style="list-style: none;"><strong>Address</strong>:{{$show->profiles->address}}</li>&nbsp;
              	<li style="list-style: none;"><strong>Contact</strong>:{{$show->profiles->phone}}</li>&nbsp;
              	<li style="list-style: none;"><strong>Birth Date</strong>:{{$show->profiles->dob}}</li>&nbsp;
              	{{-- <p class="btn btn-danger">
              	<li style="list-style: none; border:2px solid #ccffcc;"><strong>About Me</strong>:{{$show->profiles->bio}}</li></p> --}}
              	@endif 
              </ul>
            </div>
          </div>

        </div>

        

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<div class="modal fade" id="staticBackdropProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class=" modal-dialog">
<div class=" modal-content">
         
          <div class="modal-header">
          	{{-- <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5> --}}
          	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          	 @if(Session::has('message'))
          <div class="alert alert-success">
          {{Session::get('message')}}
          </div>
          @endif
            <form  action="{{ route('userprofileupdate') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <input type="hidden" name="user_id" value="{{Auth::guard('myweb')->user()->id}}">

              <div class="mb-3">
              	<label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" name="address">
              </div>

              <div class="mb-3">
              	<label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone">
              </div>

              <div class="mb-3">
              	<label for="exampleInputEmail1" class="form-label">Bio</label>
                <input type="text" class="form-control" name="bio">
              </div>

              <div class="mb-3">
              	<label for="exampleInputEmail1" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" name="dob">
              </div>

              <div class="mb-3">
              	<label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" name="image">
              </div>
               <div class="mb-3">
              	<label for="exampleInputEmail1" class="form-label">Cover Image</label>
                <input type="file" class="form-control" name="cover">
              </div>
              <input type="submit" name="login" value="change" class="btn btn-success">
              
            </form>
          </div>
          </div>
</div>
</div>



<div class="modal  fade" id="staticBackdropProfileUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      

         <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	 @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @endif
     <form action="" method="post" enctype="multipart/form-data">
          @csrf

           <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
      </div>               

                        <div class="mb-3">
    <label for="exampleInputEmail1">Gender</label> &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="male">Male &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="Female">Female &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="Others">Others
     
                      
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" name="address" class="form-control">
  </div>
  <input type="hidden" name="user_id" value="{{Auth::guard('myweb')->user()->id}}">


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control"> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">About Me</label>
    <input type="text" name="bio" class="form-control"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control">    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
    <input type="file" name="image" class="form-control">    
  </div>
  <input type="submit" name="login" value="Change" class="btn btn-success">
</form>
      
      </div>
    </div>
  </div>
</div>
@endsection