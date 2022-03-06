@extends('template')

@section('data')
    <br>
    <div class="row justify-content-center">
    <div class="card text-white bg-dark" style="max-width: 50rem;">
        <div class="card-header"><h3>Add a song to the queue!</h3></div>
        <div class="card-body">
        <form method='GET' action='/newsong'>
            <label for='title'>Title:</label>
            <input type='text' class= "form-control" name='title' id='title' value=''>
            <br>
            <br>
            <label for='link'>Link:</label>
            <input type='text' class= "form-control" name='link' id='link' value=''>
            <br>
            <br>
            <label for='duration'>Duration:</label>
            <input type='text' class= "form-control" name='duration' id='duration' value=''>
            <br>
            <br>
            <input type='submit' class='btn btn-primary btn-small'>
        </form>
        </div>
    </div>
    </div>
@endsection






