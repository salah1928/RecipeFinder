@push('styles')
<link href='{{asset('css/recipecreate.css')}}' rel='stylesheet'>
@endpush
@extends('layouts.app')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add recipe</a></h2>
<br>
<div id="form">
    <recipe-form>
  <recipe-form/>

</div>
{{--  
<form action="{{ route('store') }}" enctype="multipart/form-data" method="POST" name="add_recipe">
@csrf
 
<div class="row">
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Ingredients</strong>
            <textarea class="form-control" col="4" name="ingredients" placeholder="Enter ing"></textarea>
            <span class="text-danger">{{ $errors->first('ingredients') }}</span>
        </div>
    </div>
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-7 m-auto">
        <strong>Recipe Img</strong>
        <input class="col-md-7 m-auto" name="image" type="file">
    </div>
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Step</strong>
            <input type="text" name="stepN" class="form-control" placeholder="Enter step name">
        </div>
    </div>
    <div class="col-md-7 m-auto">
        <div class="form-group">
            <strong>Step desc</strong>
            <input type="text" name="stepD" class="form-control" placeholder="Enter step description">
        </div>
    </div>
    <div class="col-md-7 m-auto">
        <strong>Step Img</strong>
        <input class="col-md-7 m-auto" name="image" type="file">
    </div>
    <div class="col-md-7 m-auto">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form> --}}
@endsection