<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Audio;
use App\AudioChat;
use App\ImageChat;

class ActionController extends Controller
{
    public function nomor1()
    {
        $img = Image::all();

        return view('image', ['imgs' => $img]);
    }

    public function nomor1add(Request $req)
    {
        $img = new Image();
        $image = $req->file('image');
        $allowed_extension = ['png','jpg','jpeg','bmp'];
        if(!empty($image) && in_array(strtolower($image->getClientOriginalExtension()),$allowed_extension)){
            $file_name = str_slug($req->get('name'),'-').'.'.$image->getClientOriginalExtension();
            $img->image_path = $file_name;
            $image->move(public_path().'/upload/images/',$file_name); 
        }
        $img->image_name = $req->get('name');
        $img->save();

        return redirect()->back();
    }

    public function nomor1get($id)
    {
        $img = Image::find($id);

        return $img;
    }

    public function nomor1update(Request $req)
    {
        $img = Image::find($req->id_old);
        $img->image_name = $req->get('name');

        $image = $req->file('image');
        $allowed_extension = ['png','jpg','jpeg','bmp'];
        if(!empty($image) && in_array(strtolower($image->getClientOriginalExtension()),$allowed_extension)){
            if($img->image_path && file_exists(public_path().'/upload/images/'.$img->image_path)){
                \File::delete(public_path().'/upload/images/'.$img->image_path);
            }
            $file_name = str_slug($req->get('name'),'-').'.'.$image->getClientOriginalExtension();
            $img->image_path = $file_name;
            $image->move(public_path().'/upload/images/',$img->image_path);
        }

        $img->save();

        return redirect()->back();
    }

    public function nomor2()
    {
        $audio = Audio::all();

        return view('audio', ['audios' => $audio]);
    }

    public function nomor2add(Request $req)
    {
        $newaudio = new Audio();
        $audio = $req->file('audio');
        $allowed_extension = ['mp3','wav'];
        if(!empty($audio) && in_array(strtolower($audio->getClientOriginalExtension()),$allowed_extension)){
            $file_name = str_slug($req->get('name'),'-').'.'.$audio->getClientOriginalExtension();
            $newaudio->audio_path = $file_name;
            $audio->move(public_path().'/upload/audios/',$file_name); 
        }
        $newaudio->audio_name = $req->get('name');
        $newaudio->save();

        return redirect()->back();
    }

    public function nomor2get($id)
    {
        $audio = Audio::find($id);

        return $audio;
    }

    public function nomor2update(Request $req)
    {
        $newaudio = Audio::find($req->id_old);
        $newaudio->audio_name = $req->get('name');

        $audio = $req->file('audio');
        $allowed_extension = ['png','jpg','jpeg','bmp'];
        if(!empty($audio) && in_array(strtolower($audio->getClientOriginalExtension()),$allowed_extension)){
            if($newaudio->audio_path && file_exists(public_path().'/upload/audios/'.$newaudio->audio_path)){
                \File::delete(public_path().'/upload/audios/'.$newaudio->audio_path);
            }
            $file_name = str_slug($req->get('name'),'-').'.'.$audio->getClientOriginalExtension();
            $newaudio->audio_path = $file_name;
            $audio->move(public_path().'/upload/audios/',$file_name);
        }

        $newaudio->save();

        return redirect()->back();
    }

    public function nomor3()
    {
        return view('nomor3');
    }

    public function nomor3kirim(Request $req)
    {
        $img = new Image();
        $image = $req->file('image');
        $allowed_extension = ['png','jpg','jpeg','bmp'];
        if(!empty($image) && in_array(strtolower($image->getClientOriginalExtension()),$allowed_extension)){
            $file_name = str_slug($req->get('name'),'-').'.'.$image->getClientOriginalExtension();
            $img->image_path = $file_name;
            $image->move(public_path().'/upload/images/',$file_name); 
        }
        $img->image_name = $req->get('name');
        $img->save();

        return redirect()->back();
    }

    public function nomor4()
    {
        return view('nomor4');
    }

    public function nomor4kirim(Request $req)
    {
        $newaudio = new Audio();
        $audio = $req->file('audio');
        $allowed_extension = ['mp3','wav'];
        if(!empty($audio) && in_array(strtolower($audio->getClientOriginalExtension()),$allowed_extension)){
            $file_name = str_slug($req->get('name'),'-').'.'.$audio->getClientOriginalExtension();
            $newaudio->audio_path = $file_name;
            $audio->move(public_path().'/upload/audios/',$file_name); 
        }
        $newaudio->audio_name = $req->get('name');
        $newaudio->save();

        return redirect()->back();
    }

    public function nomor5()
    {
        return view('nomor5');
    }

    public function nomor5hitung(Request $request)
    {
        $nilai1 = explode(",", $request->get('nilai1'));
        $nilai2 = explode(",", $request->get('nilai2'));
        $nilai3 = explode(",", $request->get('nilai3'));

        $index1 = $nilai1[0] + $nilai2[0] + $nilai3[0];
        $index2 = $nilai1[1] + $nilai2[1] + $nilai3[1];
        $index3 = $nilai1[2] + $nilai2[2] + $nilai3[2];
        $index4 = $nilai1[3] + $nilai2[3] + $nilai3[3];
        $index5 = $nilai1[4] + $nilai2[4] + $nilai3[4];
        $index6 = $nilai1[5] + $nilai2[5] + $nilai3[5];

        $totalindex = array($index1,$index2,$index3,$index4,$index5,$index6);

        $totalnilai = $index1 + $index2 + $index3 + $index4 + $index5 + $index6;

        // dd($totalnilai);

        return view('nomor5result', ['nilai1' => $nilai1, 'nilai2' => $nilai2, 'nilai3' => $nilai3, 'totalindex' => $totalindex, 'totalnilai' => $totalnilai]);
    }
}
