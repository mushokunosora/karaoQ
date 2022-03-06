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
            $song->link = $link;
            $song->duration = $duration;
            $song->save();
        }


        return view('main');

        /*
         * ->with([
        'searchTerm' => $searchTerm,
        'caseSensitive' => $request->has('caseSensitive'),
        'searchResults' => $searchResults
    ]);
         */
    }

    /*
     * takes array of song ids to delete*/
    public function dropsongs(Request $request)
    {
        $idsdata = $request->input('ids', null);

        if($idsdata) {
            $ids = explode(",",$idsdata);
            foreach ($ids as $id){
                $song = Song::where('id', '=', $id)->first();
                $song->delete();
            }
        }
        return view('home');
    }

}

