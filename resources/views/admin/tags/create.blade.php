@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Create new Tag
    </div>

<div class="card-body">
<form method="POST" action="{{route('tag.store')}}">
{{csrf_field() }}
<div class="form-group">
    <label for="tag" >Tag</label>
    <input type="text" class="form-control" name="tag">

</div>


@include('admin.includes.errors')
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Tag</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


