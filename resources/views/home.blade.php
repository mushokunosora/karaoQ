@extends('template')

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='/css/dash.css' type='text/css' rel='stylesheet'>
    <link href='/dropzone/dist/basic.css' type='text/css' rel='stylesheet'>
    <link href='/dropzone/dist/dropzone.css' type='text/css' rel='stylesheet'>
    <link  href="/cropperjs/dist/cropper.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/9q2wmbwknlog4vltrb8u9ldfc2ws9l1d6pou2ilfbxg8l3vk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/dropzone/dist/dropzone.js"></script>
    <script src="/cropperjs/dist/cropper.js"></script>
    <script>
        var user = {!! auth()->user()->toJson() !!}["id"];
    </script>
    <script src="js/acc.js"></script>
@endpush

@section('data')
    @if(Auth::check())
        <div class="modal-backdrop" aria-hidden="true"></div>
        <div class="card">
            <div class="card-header">
                <h2>{{ __('Dashboard') }}</h2>
            </div>
            <div class="card-body bs-docs-section">
                    <h3>{{ __('Welcome ')  }}{{Auth::user()["name"]}}{{ __('!')  }}</h3>
                    <div class ="row">

                    </div>
            </div>
        </div>
    @else
        <?php
            header("Location: /login");
        die();
        ?>
    @endif
@endsection
