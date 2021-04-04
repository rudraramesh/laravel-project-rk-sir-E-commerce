@extends('admin.header')
@section('title','Admin Show Product')
@section('content-section')



<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
           
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Show Product</li>
            </ol>
          </div>
        </div>

<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                User Send Message List
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th> Name</th>
                    <th> Email</th>
                    <th> Subject</th>
                    <th> Message</th>
                    <th>Reply</th>
                  </tr>

                  @foreach($showusermessage as $usermessage)
                  <tr>
                    <td>{{$usermessage->your_name}}</td>
                    <td>{{$usermessage->your_email}}</td>
                    <td>{{$usermessage->your_subject}}</td>
                    <td>{{$usermessage->your_message}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
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