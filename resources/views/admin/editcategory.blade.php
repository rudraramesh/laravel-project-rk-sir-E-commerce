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
              <li><i class="fa fa-files-o"></i>Edit Category</li>
            </ol>
          </div>
        </div>


<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Category Form
              </header>
              @if(Session::has('message'))
                	<div class="alert alert-success">
                		{{Session::get('message')}}
                	</div>
                	@endif
              <div class="panel-body">
                <div class="form">
                	

                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="{{route('admin.updatecategory',$category->id)}}">
                  	@csrf
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Category Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="cname" name="cname" value="{{$category->category_name}}" type="text" />
                      </div>
                    </div>
                   
                    
                   
                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Update Category</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
    </section>
</section>




@endsection