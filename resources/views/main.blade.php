@extends('template')

@section('data')
    <br>
    @if($length<=20)
    <div class="justify-content-center">
    <div class="card text-white border-primary" style="max-width: 50rem; margin:0 auto;">
        <div class="card-header"><h3>add a song to the queue!</h3></div>
        <div class="card-body bg-dark ">
        <form method='GET' action='/newsong'>
            <label for='title'>title:</label>
            <input type='text' class= "form-control" name='title' id='title' value=''>
            <br>
            <br>
            <label for='link'>link:</label>
            <input type='text' class= "form-control" name='link' id='link' value=''>
            <br>
            <br>
            <input type='submit' class='btn btn-primary btn-small'>
        </form>
        </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    @endif



    <div class="justify-content-center">
        <div class="bs-component">
        <div class="list-group" style="max-width: 50rem; margin:0 auto;">
            @if($length>0)

                <div class="list-group-item list-group-item-action success" style="background-color:#41d7a7 !important"><h3>currently playing: {{$queue[0]->title}}</h3></div>
                @if($length>1)
                    <div class="list-group-item list-group-item-action" style="background-color:#39cbfb !important;"><h3>next up: {{$queue[1]->title}}</h3></div>
                    @if($length>2)
                        @for($i = 2; $i < $length; $i++)
                                <div class="list-group-item list-group-item-action">
                                <h3>{{$queue[$i]->title}}</h3>
                                </div>
                        @endfor
                    @endif
                @endif



            @else
                <div class="list-group-item list-group-item-action active" style=""><h3>nothing on right now</h3></div>
            @endif
        </div>
    </div>




    </div>
    <br>
    </div>
@endsection






