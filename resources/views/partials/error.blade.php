
@if(count($errors)>0)
<div class="alert alert-danger">
    <p>Data Entry Error!</p>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>

@endif