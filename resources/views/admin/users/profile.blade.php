@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Edit Your Profile
    </div>

<div class="card-body">
<form method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
{{csrf_field() }}
{{-- @foreach ($users->profile() as $user) --}}


<div class="form-group">
    <label for="name" >User</label>
<input type="text" class="form-control" value="{{$user->name}}" name="name">

</div>
<div class="form-group">
    <label for="email" >Email</label>
<input type="email" class="form-control" value="{{$user->email}}" name="email">

</div>
<div class="form-group">
    <label for="password">New Password</label>
    <input type="password" name="password" class="form-control">
</div>
<div class="form-group">
    <label for="avatar">Upload New avatar</label>
<input type="file" name="avatar" value="" class="form-control">
</div>
<div class="form-group">
    <label for="facebook">Facebook Profile</label>
    <input type="text" name="facebook" value="{{@$user->profile->facebook}}" class="form-control">
</div>
<div class="form-group">
    <label for="youtube">Youtube Profile</label>
    <input type="text" name="youtube" value="{{ @$user->profile->youtube}}"class="form-control">
</div>
<div class="form-group">
    <label for="about">about</label>
<textarea name="about" id="about" cols="6" rows="6" class="form-control">{{ @$user->profile->about}}</textarea>
</div>
{{-- /@endforeach --}}
@include('admin.includes.errors')
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Save</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


