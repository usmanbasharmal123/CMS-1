@extends('Layouts.app')
@section('content')
<div class="card">

        <div class="card-header">
          <div class="text-center" style="bold"><b>Trashed Category List</b></div>
        </div>

    <div class="card-body">
<table class="table table-hover">
<thead>
    <th>Category</th>
    <th>Restore</th>
    <th>Delete Permanently</th>
</thead>
<tbody>
    @if($trush_category->count()>0)
    @foreach ($trush_category as $category)
    <tr>
        <td>{{$category->name}}</td>
    <td style="height:10px"><a href="{{route('category.restore',['id'=>$category->id])}}" class="btn btn-primary " >Restore</a></td>

    <td><a href="{{route('category.deleteParmanent',['id'=>$category->id])}}" class="btn btn-danger btn-xs">Delete Permanently</a></td>

    </tr>
    @endforeach
    @else
    <tr>
        <th colspan="5" class="text-center"><span class="alert alert-danger" role="alert">There is no trashed data</span></th>
    </tr>
    @endif
</tbody>
</table>
    </div>
</div>
</div>
@endsection
