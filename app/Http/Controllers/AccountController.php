<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tmppic;

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

    public function storeAlpha(Request $request)
    {
        //dd($request)

        $image = $request->file('profilefile');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.Auth::user()['id'].'-'.time().'.'.$extension;
        $image->move(public_path('/tmp-profiles'),$file_name);


        $imageUpload = new Tmppic();
        $imageUpload->original_filename = $fileInfo;
        $imageUpload->filename = $file_name;
        $imageUpload->userid = $request['user'];
        $imageUpload->save();

        return;
    }

    public function storeBeta(Request $request)
    {
        define('UPLOAD_DIR', 'profiles/');
        $img = $request->file;

        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $file0 = Auth::user()['id'] . '-' . time() .  '.png';

        $file = UPLOAD_DIR . $file0;

        file_put_contents($file, $data);

        $path = public_path('profiles/') . Auth::user()["profilefile"];

        if (file_exists($path) and Auth::user()["profilefile"] != "default.jpeg") {
            unlink($path);
        }

        Auth::user()["profilefile"] = $file0;
        Auth::user()->save();
    }

    public function destroytmppic(Request $request)
    {
        $filename =  $request->get('filename');

        $filenameTMP = Tmppic::where('original_filename', $filename)
            ->where('userid', $request['userid'])
            ->first()['filename'];

        Tmppic::where('original_filename',$filename)->delete();

        $path = public_path('/tmp-profiles/').$filenameTMP;

        if(file_exists($path)) {
            unlink($path);

        }

        return \Redirect::to('/account');
    }

}


