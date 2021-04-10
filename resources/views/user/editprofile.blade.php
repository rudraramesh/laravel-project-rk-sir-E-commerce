@extends('user.layout.master')
@section('title','editprofile')
@section('content-section')



<div class="row mb-3">
<div class="col-md-3">
  
</div>
<div class="col-md-5 mt-5">
         @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
        @endif
     <form action="{{route('updateprofile',$show->id)}}" method="POST" enctype="multipart/form-data">
          @csrf

           <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$show->name}}">
   
      </div>               

    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" value="{{$show->profiles->address}}">
  </div>
  <!-- <input type="hidden" name="user_id" value="{{Auth::guard('myweb')->user()->id}}"> -->


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control" value="{{$show->profiles->phone}}"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">bio</label>
    <input type="text" name="bio" class="form-control" value="{{$show->profiles->bio}}"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control" value="{{$show->profiles->dob}}">    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
    <input type="file" name="image" class="form-control">    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cover Image</label>
    <input type="file" name="cover" class="form-control">    
  </div>
  <input type="submit" name="login" value="Change" class="btn btn-success">
</form>
      
      </div>


</div>

@endsection