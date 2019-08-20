@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Edit Tag: {{$tag->tag}}
    </div>

<div class="card-body">
<form method="POST" action="{{route('tag.update',['id'=>$tag->id])}}">
{{csrf_field() }}
<div class="form-group">
    <label for="tag" >Tag</label>
<input type="text" class="form-control" name="tag" value="{{$tag->tag}}">

</div>


@include('admin.includes.errors')
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Tag</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


