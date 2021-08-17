@extends('template')

@section('data')
    <div class="card">
        <div class="card-header">
            <h2>{{ __('Dashboard') }}</h2>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h3>{{ __('Welcome ')  }}{{Auth::user()["name"]}}{{ __('!')  }}</h3>
                <br>
            <!--<image class="profilepic" src='/profilepics/{{Auth::user()["profilefile"]}}'><br> -->
        </div>
    </div>

@endsection
