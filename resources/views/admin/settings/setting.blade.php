@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Edit Blog Settings
    </div>

<div class="card-body">
<form method="POST" action="{{route('settings.update')}}">
{{csrf_field() }}
<div class="form-group">
    <label for="site_name" >Site_name</label>
<input type="text" class="form-control" name="site_name" value="{{$settings->site_name}}">

</div>
<div class="form-group">
    <label for="address" >Address</label>
<input type="text" class="form-control" name="address" value="{{$settings->address}}">

</div>
<div class="form-group">
    <label for="contact_number" >Contact Number</label>
<input type="text" class="form-control" name="contact_number" value="{{$settings->contact_number}}">

</div>
<div class="form-group">
    <label for="email" >Contact Email</label>
<input type="email" class="form-control" name="contact_email" value="{{$settings->contact_email}}">

</div>


@include('admin.includes.errors')
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Site Setting</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


