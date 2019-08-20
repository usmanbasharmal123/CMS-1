@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Create new User
    </div>

<div class="card-body">
<form method="POST" action="{{route('user.store')}}">
{{csrf_field() }}
<div class="form-group">
    <label for="name" >User</label>
    <input type="text" class="form-control" name="name">

</div>
<div class="form-group">
    <label for="email" >Email</label>
    <input type="email" class="form-control" name="email">

</div>


@include('admin.includes.errors')
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Add User</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


