@extends('Layouts.app')
@section('content')
<div class="card">

        <div class="card-header">
          <div class="text-center" style="bold"><b>Tag List</b></div>
        </div>

    <div class="card-body">
<table class="table table-hover">
<thead>
    <th>Tag</th>
    <th>Edit</th>
    <th>Trush</th>
</thead>
<tbody>
    @if($tags->count() > 0)
    @foreach ($tags as $tage)

    <tr>
        <td>{{$tage->tag}}</td>
    <td style="height:10px"><a href="{{route('tag.edit',['id'=>$tage->id])}}" class="btn btn-primary " >Edit</a></td>
    <td><a href="{{route('tag.delete',['id'=>$tage->id])}}" class="btn btn-warning btn-xs">Delete</a></td>


    </tr>

    @endforeach
    @else
    <tr>
        <th colspan="5" class="text-center">
    <span class="alert alert-warning"> There is no Tag in the Table</span>
        </th>
    </tr>
      @endif
</tbody>
</table>
    </div>
</div>
</div>
@endsection
