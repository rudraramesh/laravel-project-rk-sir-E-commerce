@extends('admin.header')
@section('title','Admin-AddCategory')
@section('content-section')




<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
           
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{route('admin.home')}}">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Add Category</li>
            </ol>
          </div>
        </div>


<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Category Form
              </header>
              @if(Session::has('message'))
                	<div class="alert alert-success">
                		{{Session::get('message')}}
                	</div>
                	@endif
              <div class="panel-body">
                <div class="form">
                	

                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="{{route('admin.storecategory')}}">
                  	@csrf
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Category Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="cname" type="text" />
                      </div>
                    </div>
                   
                    
                   
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save Category</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
         <section class="panel">
              <div class="panel-body progress-panel">
                <div class="row">
                  <div class="col-lg-8 task-progress pull-left">
                    <h1>All Category</h1>
                  </div>
                  <div class="col-lg-4">
                    <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="{{asset('admin/img/avatar1_small.jpg')}}">
                                        {{Auth::user()->name}}
                                </span>
                  </div>
                </div>
              </div>
               @if(Session::has('message'))
                  <div class="alert alert-success">
                    {{Session::get('message')}}
                  </div>
                  @endif
              <table class="table table-striped table-advance table-hover">
                <tbody>

                  <tr>
                    <th><i class="icon_id"></i> Category Id No</th>
                    <th><i class="icon_image"></i> Category</th>
                    <th><i class="icon_calendar"></i> Date</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($showdata as $s)

                  <tr>
                    <td>{{$s->id}}</td>
                     <td>
                      <span class="badge bg-important">{{$s->category_name}}</span>
                    </td>
                    <td>{{$s->created_at}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{route('admin.editcategory',$s->id)}}" title="edit category"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="{{route('admin.deletecategory',$s->id)}}" onclick="return confirm('are you sure delete')" title="delete category"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
               @endforeach

                </tbody>
              </table>
          </section>
    </section>
</section>




@endsection