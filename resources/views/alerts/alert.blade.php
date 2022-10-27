@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session('error') }}
    </div>
@endif


@if (session('success'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('success') }}
    </div>
@endif
