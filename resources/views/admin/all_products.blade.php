@extends('layoute.appadmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <?php
                     $all_product= DB::table('tbl_products')->get();
                    ?>
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}
                                {{ Session::forget('message') }}</p>
                        @endif

                        @if(Session::has('message1'))
                            <p class="alert alert-info">{{ Session::get('message1') }}
                                {{ Session::forget('message1') }}</p>
                        @endif
                        @if(Session::has('message2'))
                            <p class="alert alert-info">{{ Session::get('message2') }}
                                {{ Session::forget('message2') }}</p>
                        @endif

                    <h4 class="card-title">All Product</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($all_product as $key=>$product)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td><img src="{{asset(\Illuminate\Support\Facades\Storage::url($product->product_image))}}" alt="No Image"></td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->product_price}}</td>
                                                <td>{{$product->product_category}}</td>

                                                @if($product->product_status ==1)
                                                    <td>
                                                        <label class="badge badge-success">Activate</label>
                                                    </td>
                                                @else

                                                    <td>
                                                        <label class="badge badge-danger">Unactivate</label>
                                                    </td>
                                                    @endif

                                                <td>
                                                    <button class="btn btn-outline-primary"><a href="{{url('edit_product/'.$product->id)}}">Update</a> </button>
                                                    <button class="btn btn-outline-danger"><a href="{{url('delete_product/'.$product->id)}}">Delete</a></button>
                                                    @if($product->product_status ==1)
                                                        <button class="btn btn-outline-warning" > <a href="{{url('unactivate_product/'.$product->id)}}"> Unactivate </a> </button>
                                                    @else
                                                        <button class="btn btn-outline-success"><a href="{{url('activate_product/'.$product->id)}}"> Activate </a></button>
                                                    @endif
                                                </td>

                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
