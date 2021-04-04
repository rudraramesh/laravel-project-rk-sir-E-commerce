@extends('user.layout.master')
@section('title','user Show profile')
@section('content-section')



<section id="main-content">
      <section class="wrapper">
<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Product List Table
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th> Product Name</th>
                    <th> Price</th>
                    <th> Quantity</th>
                    <th> Description</th>
                    <th> Image</th>
                    <th>Action</th>
                  </tr>

                  @foreach($showprofile as $profile)
                  <tr>
                    <td>{{$profile->first_name}}</td>
                    <td>{{$profile->last_name}}</td>
                    <td>{{$profile->product_quantity}}</td>
                    <td width="480">{{$profile->product_description}}</td>
                    <td><img src="{{asset('admin/upload/products')}}/{{$profile->product_image}}" width="60"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{route('myprofile',$profile->id)}}"><i class="icon_plus_alt2">Edit</i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="{{route('admin.deleteproduct',$profile->id)}}">Delete<i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </section>
          </div>
        </div>
    </section>
</section>

@endsection