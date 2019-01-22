<div class="container">
    @if(count($errors) > 0)
        <br>
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <br>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <br>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>
