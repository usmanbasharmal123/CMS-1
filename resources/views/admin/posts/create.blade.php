@extends('Layouts.app')

@section('styles')
<!-- include summernote css/js -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
@section('content')

<div class="card">
        @include('admin.includes.errors')
        <div class="card-header">
           Create new Post
        </div>

    <div class="card-body">
    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
    {{csrf_field() }}
    <div class="form-group"><label for="title">Title</label>
        <input type="text" name="title" class="form-control"></div>
    <div class="from-group">
        <label for="category">Category</label>
        <select name="category_id" id="category" class="form-control">
            @foreach ($category as $cat)
            <option value="{{ $cat->id}}">{{ $cat->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="featured" >Featured Image</label>
        <input type="file" class="form-control" name="featured">

    </div>
    <div class="form-group">
        <label>Select Tags</label>
           @foreach ($tags as $ta)
           <div class="checkbox">
           <label><input type="checkbox" name="tags[]" value=" {{$ta->id}} "> {{$ta->tag}} </label>
        </div>
           @endforeach


        </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <div class="text-center">
                <button class="btn btn-success" type="submit">Store Category</button>
        </div>
    </div>
    </form>
    </div>
    </div>
@endsection


@section('scripts')
<!-- include libraries(jQuery, bootstrap) -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>$(document).ready(function() {
    $('#content').summernote();
  });</script>
@endsection
