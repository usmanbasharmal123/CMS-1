<div class="form-group">
        @if(count($errors)>0)
        <ul class="list-group">
        @foreach ($errors->all() as $error)

             <li class="list-group-item text-danger">


            <span class="alert alert-danger" role="alert">
                {{$error}}
            </span>
        </li>

        @endforeach
    </ul>
        @endif
    </div>
