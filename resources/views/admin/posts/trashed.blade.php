@extends('Layouts.app')
@section('content')
<div class="card">

        <div class="card-header">
          <div class="text-center" style="bold"><b>Trashed Posts</b></div>
        </div>

    <div class="card-body">
<table class="table table-hover">
<thead>
    <th>Image</th>
    <th>Post</th>
    <th>Restore</th>
    <th>Delete</th>
</thead>
<tbody>
    @if($trash_post->count() > 0)
    @foreach ($trash_post as $post)

    <tr>
    <td><img src="{{$post->featured}}"  width="50px" height="50px"></td>
        <td>{{$post->title}}</td>
    <td style="height:10px"><a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success " >Restore</a></td>
    <td style="height:10px"><a href="{{route('post.permanentdelete',['id'=>$post->id])}}" class="btn btn-primary " >Delete</a></td>


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
