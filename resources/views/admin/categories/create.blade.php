@extends('Layouts.app')
@section('content')
<div class="card">

    <div class="card-header">
       Create new Category
    </div>

<div class="card-body">
<form method="POST" action="{{route('category.store')}}">
{{csrf_field() }}
<div class="form-group">
    <label for="name" >Name</label>
    <input type="text" class="form-control" name="name">

</div>


@include('admin.includes.errors')
    <div class="form-group">
            <div class="text-center">
                    <button class="btn btn-success" type="submit">Store Category</button>
            </div>
        </div>
</form>
</div>
</div>
@endsection


