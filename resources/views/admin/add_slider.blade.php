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
                        <h4 class="card-title">Add Slider</h4>
                        {!! Form::open(['action'=>'SliderController@save_slider' , 'method'=>'POST' , 'class'=>'form-horizontal' , 'enctype'=>'multipart/form-data']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="cname">Description one</label>
                                    <input id="cname" class="form-control" name="description1" minlength="2" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="cname">Description Two</label>
                                    <input id="cname" class="form-control" name="description2" minlength="2" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="cname">Slider Image</label>
                                    {{ Form::file('slider_image' , ['class'=>"form-control"]) }}
                                <div class="form-group">
                                    <label for="cname">Status</label>
                                 <input id="cname" name="slider_status" type="checkbox" >
{{--                                    {{ Form::checkbox('slider_status', ['class'=>"form-control"]) }}--}}
                                </div>
                                {{Form::submit('Add Slider' ,['class'=>'btn btn-primary'])}}
{{--                                <input class="btn btn-primary" type="submit" value="Add Product">--}}
                            </fieldset>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
