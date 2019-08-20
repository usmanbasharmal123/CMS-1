@extends('Layouts.app')
@section('content')
<div class="card">

        <div class="card-header">
          <div class="text-center" style="bold"><b>Category List</b></div>
        </div>

    <div class="card-body">
<table class="table table-hover">
<thead>
    <th>Category</th>
    <th>Edit</th>
    <th>Trush</th>
</thead>
<tbody>
    @if($get_categories->count() > 0)
    @foreach ($get_categories as $category)

    <tr>
        <td>{{$category->name}}</td>
    <td style="height:10px"><a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-primary " >Edit</a></td>
    <td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-warning btn-xs">trush</a></td>


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
