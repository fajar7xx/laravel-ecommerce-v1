@php
    $errors = Session::get('error');
    $messages = Session::get('success');
    $info = Session::get('info');
    $warning = Session::get('warning');
@endphp

@if ($errors)
    @foreach ($errors as $key => $value)
        {{-- <div class="alert bg-danger alert-danger text-white" role="alert">
            A simple danger alert—check it out!
        </div> --}}
        <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ik ik-x"></i>
            </button>
        </div>
    @endforeach
@endif

@if ($messages)
    @foreach ($messages as $key => $value)
        {{-- <div class="alert bg-danger alert-danger text-white" role="alert">
            A simple danger alert—check it out!
        </div> --}}
        <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ik ik-x"></i>
            </button>
        </div>
    @endforeach
@endif

@if ($info)
    @foreach ($info as $key => $value)
        {{-- <div class="alert bg-danger alert-danger text-white" role="alert">
            A simple danger alert—check it out!
        </div> --}}
        <div class="alert bg-info alert-info text-white alert-dismissible fade show" role="alert">
            <strong>Info!</strong> {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ik ik-x"></i>
            </button>
        </div>
    @endforeach
@endif

@if ($warning)
    @foreach ($warning as $key => $value)
        {{-- <div class="alert bg-danger alert-danger text-white" role="alert">
            A simple danger alert—check it out!
        </div> --}}
        <div class="alert bg-warning alert-warning text-white alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="ik ik-x"></i>
            </button>
        </div>
    @endforeach
@endif