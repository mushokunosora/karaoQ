

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
    <script src="/js/vid.js"></script>
    <script>
        var user = {!! auth()->user()->toJson() !!}["id"];
    </script>
    <script src="https://www.youtube.com/iframe_api"></script>
    @if($length>0)
    <script>
        // create youtube player
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
                height: '500px',
                width: '100%',
                videoId: '{{$queue[0]->link}}',
                playerVars: {
                autoplay: 1},
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }
        function onPlayerStateChange(event) {
            if (event.data === 0) {
                //do something here
                document.getElementById("nextvid").submit()
            }
        }
    </script>
    @endif






@endpush

@section('data')
    @if(Auth::check())
         <div class="justify-content-center">
             <div class="bs-component" style="max-width: 50rem; margin:0 auto;">
                 <br>
                 @if($length>0)
                     <div id="player"></div>
                     <br>
                     <br>
                     <br>
                 @endif
                 <div class="list-group" style="max-width: 50rem; margin:0 auto;">
                     @if($length>0)
                         <form method='GET' action='/del'>
                             <ul class="list-group">
                             <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#e83283;">
                                 <h3>what's on</h3>
                             </li>
                         @for($i = 0; $i < $length; $i++)
                                 <li class="list-group-item d-flex justify-content-between align-items-center">
                                     <h3>{{$queue[$i]->title}}</h3>
                                     <span class="badge"><input class="form-check-input" type="checkbox" name="ids[]" value="{{$queue[$i]->id}}" id="{{$queue[$i]->id}}" style="height:20px; width:20px;"></span>
                                 </li>
                         @endfor
                                 <li class="list-group-item d-flex justify-content-between align-items-center">
                                     <h3></h3>
                                 <span class="badge"><input type='submit' class='btn btn-primary btn-small' value="delete"></span>
                                 </li>
                             </ul>
                         </form>
                     @else
                         <div class="list-group-item list-group-item-action active" style=""><h3>nothing on right now</h3></div>
                     @endif
                 </div>
             </div>

             <form method='GET' action='/next' id="nextvid">
             <input id="nextvideo" type="hidden">
             </form>




    @else
        <?php
            header("Location: /login");
        die();
        ?>
    @endif
@endsection
