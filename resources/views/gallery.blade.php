@extends('template')

@push('head')
    <link rel="stylesheet" href="/css/portfolio.css">
@endpush

@section('data')
    <br>
    <br>

    <div class="grid-container">
        <?php
        $directory = 'gallery/';

        if (!is_dir($directory)) {
            exit('Invalid diretory path');
        }

        $files = array();
        foreach (scandir($directory) as $file) {
            if ($file !== '.' && $file !== '..' && $file !== '.DS_Store') {
                $files[] = $file;

                echo '
                <div class="gallery">
                    <a href="/art/'. $file . '">
                    <img src="/gallery/'. $file .'">
                </a>
            </div>';


            }
        }

        //var_dump($files);
        ?>
    </div>
@endsection


