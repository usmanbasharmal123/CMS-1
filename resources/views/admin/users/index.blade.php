@extends('Layouts.app')
@section('content')
<div class="card">

        <div class="card-header">
          <div class="text-center" style="bold"><b>User List</b></div>
        </div>

    <div class="card-body">
<table class="table table-hover">
<thead>
    <th>Image</th>
    <th>Name</th>
    <th>Permissions</th>
    <th>Delete</th>
</thead>
<tbody>
    @if($users->count() > 0)
    @foreach ($users as $user)

    <tr>
    <td><img src="{{ asset(@$user->profile->avatar)}}"  width="50px" height="50px" style="border-radius:50%;"></td>
        <td>{{$user->name}}</td>
    <td>
        @if($user->admin)
        <a href="{{route('user.not.admin',['id'=>$user->id])}}" class="btn btn-danger btn-xs">Remove Permissions</a>

        @else
        <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-success btn-xs">Make Admin</a>
       @endif
    </td>
    @if(Auth::id()!==$user->id)
    <td><a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-warning btn-xs">Delete</a></td>
@endif

    </tr>

    @endforeach
    @else
    <tr>
        <th colspan="5" class="text-center">
    <span class="alert alert-warning"> There is no user in the Table</span>
        </th>
    </tr>
      @endif
</tbody>
</table>
    </div>
</div>
</div>
@endsection
