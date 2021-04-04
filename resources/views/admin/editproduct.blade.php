@extends('admin.header')
@section('title','Admin-AddProduct')
@section('content-section')



<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
           
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Add Product</li>
            </ol>
          </div>
        </div>

<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Show Product List
                <div style="float: right; margin-right: 200px;" class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
               <a href="{{ route('admin.showproduct') }}"> <button class="btn btn-primary" type="submit"> Show Product List</button></a>
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
                Add Product Form
              </header>
               @if(Session::has('updatemessage'))
                  <div class="alert alert-success">
                    {{Session::get('updatemessage')}}
                  </div>
                  @endif
              <div class="panel-body">
                <div class="form">
                 
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="{{route('admin.updateproduct',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                      <label for="productname" class="control-label col-lg-2">Product name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="pname" name="pname" type="text" value="{{$product->product_name}}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="price" class="control-label col-lg-2">Product Price <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="price" name="price" type="number" value="{{$product->product_price}}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="quantity" class="control-label col-lg-2">Product Quantity <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="quantity" name="quantity" type="number" value="{{$product->product_quantity}}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="description" class="control-label col-lg-2">Product Description <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control" name="description">{{$product->product_description}}</textarea>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="image" class="control-label col-lg-2">Product Image <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="image" name="image" type="file" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="category" class="control-label col-lg-2">Category <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control" name="category">
                          <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                            @foreach($category as $c) 
                           <option value="{{$c->id}}">{{$c->category_name}}</option>

                          @endforeach  
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Update Product</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
      </tbody>
    </table>
      </div>
    </div>
  </section>
</div>
</div>
</section>
</section>

@endsection