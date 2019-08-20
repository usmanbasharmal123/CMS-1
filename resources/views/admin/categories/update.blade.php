@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Update Category {{$edit_category->name}}
    </div>

<div class="card-body">
<form method="POST" action="{{route('category.update',['id'=>$edit_category->id])}}">
{{csrf_field() }}
<div class="form-group">
    <label for="name" >Name</label>
<input type="text" class="form-control" name="name" value="{{$edit_category->name}}">

</div>


<div class="form-group">

       @include('admin.includes.errors')
    </div>
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Category</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


