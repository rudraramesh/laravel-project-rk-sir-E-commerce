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
                Add a Product
                <div style="float: right; margin-right: 200px;" class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
               <a href="{{ route('admin.addproduct') }}"> <button class="btn btn-primary" type="submit"> Add New Product</button></a>
              </div>
            </div>
              </header>
	
        </section>
    </div>
</div>

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

                  @foreach($showproduct as $product)
                  <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td>{{$product->product_quantity}}</td>
                    <td width="480">{{$product->product_description}}</td>
                    <td><img src="{{asset('admin/upload/products')}}/{{$product->product_image}}" width="60"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{route('admin.editproduct',$product->id)}}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="{{route('admin.deleteproduct',$product->id)}}"><i class="icon_close_alt2"></i></a>
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