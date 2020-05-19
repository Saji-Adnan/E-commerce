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
                        <h4 class="card-title">Add Category</h4>
                       {!! Form::open(['action'=>'CategoryController@save_category','method'=>'post' , 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <label for="cname">Category Name</label>
                                    <input id="cname" class="form-control" name="category_name" minlength="2" type="text" required>
                                </div>
{{--                                <input class="btn btn-primary" type="submit" value="Submit">--}}
                                {{Form::submit('Add Category' ,['class'=>'btn btn-primary'])}}
                            </fieldset>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
