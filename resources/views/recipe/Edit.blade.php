@extends('layouts.app')
 
@section('content')
<recipe-edit :recipe="{{ $recipe_info}}" :stepes="{{$steps}}"></recipe-edit>
{{-- <h2 style="margin-top: 12px;" class="text-center">Edit recipe</a></h2>
<br>
 
<form action="{{ route('update', $recipe_info->id) }}" enctype="multipart/form-data" method="POST" name="update_recipe">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <strong>Ingredients</strong>
            <textarea class="form-control" col="4" name="ingredients" placeholder="Enter ing"></textarea>
            <span class="text-danger">{{ $errors->first('ingredients') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <input name="image" type="file">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form> --}}
@endsection