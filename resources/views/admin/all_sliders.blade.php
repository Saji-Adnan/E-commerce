@extends('layoute.appadmin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <?php
                    $tbl_slider= DB::table('tbl_slider')->get();
                    ?>
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}
                                {{ Session::forget('message') }}</p>
                        @endif
                        @if(Session::has('message1'))
                            <p class="alert alert-info">{{ Session::get('message1') }}
                                {{ Session::forget('message1') }}</p>
                        @endif
                    <h4 class="card-title">Sliders</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Image</th>
                                        <th>Description 1</th>
                                        <th>Description 2</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($tbl_slider as $key=>$slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{asset(\Storage::url($slider->slider_image))}}" alt="No Image"></td>
                                            <td>{{$slider->description1}}</td>
                                            <td>{{$slider->description2}}</td>
                                            @if($slider->slider_status ==1)
                                                <td>
                                                    <label class="badge badge-success">Activate</label>
                                                </td>
                                            @else

                                                <td>
                                                    <label class="badge badge-danger">Unactivate</label>
                                                </td>
                                            @endif

                                            <td>
                                                <button class="btn btn-outline-primary"><a href="{{url('edit_slider/'.$slider->id)}}">Update</a></button>
                                                <button class="btn btn-outline-danger"><a href="{{url('delete_sliders/'.$slider->id)}}">Delete</a></button>
                                                @if($slider->slider_status ==1)
                                                    <button class="btn btn-outline-warning"><a href="{{url('unactivate_slider/'.$slider->id)}}">Unactivate</a></button>
                                                @else
                                                    <button class="btn btn-outline-success"><a href="{{url('activate_slider/'.$slider->id)}}">Activate</a></button>
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
