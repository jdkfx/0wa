<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;
use App\myGengoImage;

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
        $myGengoImage = new MyGengoImage;
        
        return view('mygengo.create',[
            'myGengoImage' => $myGengoImage,
            ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'text' => 'required|max:191',
            ]);
            
        $backImg = public_path('back/backImg.jpg');
        $inToImg = $request->text;
        
        $createdImg = Image::make($backImg)->text($inToImg, 0, 0, function($font) {
            $font->file('fonts/SawarabiGothic-Regular.ttf');
            $font->size(18);
            $font->align('center');
            $font->color('#ffffff');
        });
        
        $path = $createdImg->save(public_path('createdImg'));
        
        return view('mygengo.complete',[
            'createdImg' => $path,
            ]);
    }
}
