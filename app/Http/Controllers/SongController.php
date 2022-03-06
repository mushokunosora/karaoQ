<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Support\Facades\Hash;

class SongController extends Controller
{
    function get_youtube_id_from_url($url)  {
        preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);    return $results[6];
    }
    /**
     * GET
     * /newsong
     */
    public function newsong(Request $request)
    {
        $title = $request->input('title', null);
        $link = $request->input('link', null);
        $duration = $request->input('duration', null);

        if($title and $link and $duration) {
            $song = new Song();
            $song->title =$title;
            $song->link = $this->get_youtube_id_from_url($link);
            $song->duration = $duration;
            $song->save();
        }
        $queue=Song::all();
        $length=sizeof($queue);
        return view('main')->with([
            'queue'=> $queue,
            'length' => $length
        ]);
    }

    /*
     * takes array of song ids to delete*/
    public function dropsong(Request $request)
    {
        $idsdata = $request->input('ids', null);

        if($idsdata) {
            foreach ($idsdata as $id){
                $song = Song::where('id', '=', $id)->first();
                $song->delete();
            }
        }
        $queue=Song::all();
        $length=sizeof($queue);
        return view('home')->with([
            'queue'=> $queue,
            'length' => $length
        ]);
    }

    public function nextsong()
    {
        $song = Song::orderBy('id')->first();
        $song->delete();

        $queue=Song::all();
        $length=sizeof($queue);
        return view('home')->with([
            'queue'=> $queue,
            'length' => $length
        ]);
    }

}

