<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tmppic;

class AccountController extends Controller
{
    /*DEPRECATED PROFILE PAGE. NO NEED.
    public function profileSave(Request $request)
    {
        //dd($request);
        if(!is_null($request["abouti"])) {
            Auth::user()["about"] = $request["abouti"];
        }
        else{
            Auth::user()["about"] = "";
        }
    }*/
}


