@extends('Layouts.app')
@section('content')
<div class="card">

        <div class="card-header">
          <div class="text-center" style="bold"><b>Posts List</b></div>
        </div>

    <div class="card-body">
<table class="table table-hover">
<thead>
    <th>Image</th>
    <th>Post</th>
    <th>Edit</th>
    <th>Trush</th>
</thead>
<tbody>
    @if($posts->count() > 0)
    @foreach ($posts as $post)

    <tr>
    <td><img src="{{$post->featured}}"  width="50px" height="50px"></td>
        <td>{{$post->title}}</td>
    <td style="height:10px"><a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-primary " >Edit</a></td>
    <td><a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-warning btn-xs">trush</a></td>


    </tr>

    @endforeach
    @else
    <tr>
        <th colspan="5" class="text-center">
    <span class="alert alert-warning"> There is no Category in the Table</span>
        </th>
    </tr>
      @endif
</tbody>
</table>
    </div>
</div>
</div>
@endsection
