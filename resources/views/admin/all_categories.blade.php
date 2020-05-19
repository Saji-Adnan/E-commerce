@extends('layoute.appadmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <?php
                     $all_category = DB::table('tbl_category')
                                            ->get();
                    ?>
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}
                                {{ Session::forget('message') }}</p>
                        @endif
                        @if(Session::has('message1'))
                            <p class="alert alert-info">{{ Session::get('message1') }}
                                {{ Session::forget('message1') }}</p>
                        @endif
                    <h4 class="card-title">All Categories</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>Order </th>
                                        <th>Product Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all_category as $key=>$category)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>
                                                <button class="btn btn-outline-primary"><a href="{{url('edit_category/'.$category->id)}}">Update</a></button>
                                                <button class="btn btn-outline-danger"><a href="{{url('delete_category/'.$category->id)}}">Delete</a></button>
                                            </td>
                                        </tr>

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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
