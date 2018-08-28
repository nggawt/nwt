@if (count($errors->createPageErrors) > 0)
<div class="col-sm-3 hidden-xs">
    <div class="errors alert alert-warning" role="alert">
        <ul>
            @foreach($errors->createPageErrors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
