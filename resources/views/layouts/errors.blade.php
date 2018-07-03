@if( Session::has( 'message' ) )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! Session::get( 'message' ) !!}
    </div>
@endif

@if( Session::has( 'status' ) )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! Session::get( 'status' ) !!}
    </div>
@endif

@if( Session::has( 'error' ) )
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! Session::get( 'error' ) !!}
    </div>
@endif

@if(count($errors->all()) != 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    </div>
@endif