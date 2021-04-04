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
              <li><i class="fa fa-files-o"></i>Add Tags</li>
            </ol>
          </div>
        </div>


<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Tags Form
              </header>
             
              <div class="panel-body">
                <div class="form">
                	
                   @if(Session::has('msg'))
                  <div class="alert alert-success">
                    {{Session::get('msg')}}
                  </div>
                  @endif
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="{{route('admin.storetags')}}">
                  	@csrf
                    <div class="form-group ">
                      <label for="tname" class="control-label col-lg-2">Tags Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="tname" name="tname" type="text" />
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Add Tags</button>
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
                    <h1>All Tags</h1>
                  </div>
                  <div class="col-lg-4">
                    <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="{{asset('admin/img/avatar1_small.jpg')}}">
                                        {{Auth::user()->name}}
                                </span>
                  </div>
                </div>
              </div>
              <table class=" col-lg-4 table-striped table-advance table-hover">
                <tbody>

                  <tr>
                    <th><i class="icon_id"></i> Tags Id No</th>
                    <th><i class="icon_image"></i> Tags Name</th>
                  </tr>
                  @foreach($showtag as $tg)

                  <tr>
                    <td>{{$tg->id}}</td>
                     <td>
                      <span class="badge bg-important">{{$tg->tags_name}}</span>
                    </td>
                  </tr>
               @endforeach

                </tbody>
              </table>
          </section>
    </section>
</section>

@endsection