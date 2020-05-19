@extends('layoute.appadmin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
             <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}
                                {{ Session::forget('message') }}</p>
                        @endif
                         @if(Session::has('message1'))
                            <p class="alert alert-danger">{{ Session::get('message1') }}
                                {{ Session::forget('message1') }}</p>
                        @endif

                        <h4 class="card-title">Edit Product</h4>
                      {!! Form::open(['action'=> 'Productcontroller@update_product' , 'method'=>'POST' , 'class'=>'form-horizontal' , 'enctype'=>'multipart/form-data']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="cname">Product Name</label>
                                    <input id="cname" class="form-control" name="product_name" value="{{$select_product->product_name}}" minlength="2" type="text" required>
                                    <input id="cname" class="form-control" name="product_id" value="{{$select_product->id}}" minlength="2" type="hidden" required>
                                </div>
                                <div class="form-group">
                                    <label for="cname">Product Price</label>
                                    <input id="cname" class="form-control" name="product_price" value="{{$select_product->product_price}}" minlength="2" type="number" required>
                                </div>
                                 <div class="form-group">
                                    <label for="cname">Product Category</label>
                                  <select  id="sortingField" class="form-control" name="product_category">
                                      <?php
                                      $categories = DB::table('tbl_category')
                                                            ->where('category_name' , '!=' , $select_product->product_category)->get();
                                      ?>
                                      <option>{{$select_product->product_category}}</option>
                                      @foreach($categories as $category)
                                          <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                          @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label for="cname">Product Image</label>
{{--                                    <input id="cname" class="form-control" name="product_image" minlength="2" type="file" required>--}}
                                    {{ Form::file('product_image' , ['class'=>"form-control" ]) }}
                                </div>
                                <div class="form-group">
                                    <label for="cname">Status</label>
                                    <input id="cname" name="product_status" type="checkbox" value="{{$select_product->product_price}}"  >
                                </div>
{{--                                <input class="btn btn-primary" type="submit" value="Add Product">--}}
                                {{ Form::submit('Update Product',['class'=>'btn btn-primary']) }}
                            </fieldset>
                        {{ Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
