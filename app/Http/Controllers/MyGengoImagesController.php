<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;
use App\myGengoImage;
use Carbon\Carbon;

class MyGengoImagesController extends Controller
{
    public function index()
    {
        $myGengoImages = myGengoImage::all();
        
        return view('mygengo.index',[
            'myGengoImages' => $myGengoImages,
            ]);
    }
    
    public function create()
    {
        $myGengoImage = new myGengoImage;
        
        return view('mygengo.create',[
            'myGengoImage' => $myGengoImage,
            ]);
    }
    
    public function store(Request $request)
    {
        $myGengoImage = new myGengoImage;
        
        $this->validate($request,[
            'text' => 'required|max:4',
            ]);
            
        $backImg = public_path().'/storage/back/backImg.jpg';
        $inToImg = $request->text;
        
        $createdImg = Image::make($backImg)->text($inToImg, 350, 300, function($font) {
            $font->file(public_path().'/fonts/hkgokukaikk.ttf');
            $font->size(70);
            $font->align('center');
            $font->color('#000000');
            $font->angle(60);
        });
        
        $timestamp = Carbon::now()->timestamp;
        
        $createdImg->save(public_path() . '/storage/createdImg/'. $timestamp . '.jpg');
        
        $myGengoImage->createdImg = '/storage/createdImg/' . $timestamp . '.jpg';
        $myGengoImage->save();
        
        return view('mygengo.complete',[
            'myGengoImage' => $myGengoImage,
            ]);
    }
}
