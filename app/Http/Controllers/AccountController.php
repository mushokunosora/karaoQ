<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;

class AccountController extends Controller
{
    public function profileSave(Request $request)
    {
        //dd($request);
        if(!is_null($request["abouti"])) {
            Auth::user()["about"] = $request["abouti"];
        }
        else{
            Auth::user()["about"] = "";
        }

        if($request["showmail"]=="true"){
            Auth::user()["showemail"] = true;
        }
        else{
            Auth::user()["showemail"] = false;
        }

        if(!is_null($request["locationin"])) {
            Auth::user()["location"] = $request["locationin"];
        }
        else{
            Auth::user()["location"] = "";
        }

        if($request["showloc"]=="true"){
            Auth::user()["showloc"] = true;
        }
        else{
            Auth::user()["showloc"] = false;
        }

        Auth::user()->save();

        return \Redirect::to('/account');
    }

}


