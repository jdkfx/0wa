<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;
use App\myGengoImage;
use Carbon\Carbon;
use App\Http\Requests\CreateMyGengoImageRequest;

class MyGengoImagesController extends Controller
{
    public function index()
    {
        $myGengoImages = myGengoImage::latest()->paginate(10);
        
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
    
    public function store(CreateMyGengoImageRequest $request)
    {
        $myGengoImage = new myGengoImage;
        
        $inToImg = $request->text;
        $createdImg = $this->change_per_strlen($inToImg);
        
        $filename = \Illuminate\Support\Str::random(40);
        $createdImg->save(public_path() . '/storage/createdImg/'. $filename . '.jpg');
        
        $myGengoImage->createdImg = '/storage/createdImg/' . $filename . '.jpg';
        $myGengoImage->save();
        
        return view('mygengo.complete',[
            'myGengoImage' => $myGengoImage,
            ]);
    }
    
    // 文字数を判定し、改行する
    // 文字数ごとにフォントの大きさを変える
    // 最大は四文字
    public function change_per_strlen($inToImg){
        $strlen = mb_strlen($inToImg);
        $backImg = public_path().'/storage/back/backimg.jpg';
        
        switch($strlen){
            case 1:
                $createdImg = Image::make($backImg)->text($inToImg, 355, 340, function($font) {
                    $font->file(public_path().'/fonts/hkgokukaikk.ttf');
                    $font->size(200);
                    $font->align('center');
                    $font->color('#000000');
                    $font->angle(7);
                    });
                return $createdImg;
                break;
            case 2:
                $strarray = $this->vertical_writing(2,$inToImg);
                $createdImg = Image::make($backImg)->text($strarray, 360, 400, function($font) {
                    $font->file(public_path().'/fonts/hkgokukaikk.ttf');
                    $font->size(130);
                    $font->align('center');
                    $font->color('#000000');
                    $font->angle(7);
                    });
                break;
            case 3:
                $strarray = $this->vertical_writing(3,$inToImg);
                $createdImg = Image::make($backImg)->text($strarray, 360, 385, function($font) {
                    $font->file(public_path().'/fonts/hkgokukaikk.ttf');
                    $font->size(80);
                    $font->align('center');
                    $font->color('#000000');
                    $font->angle(7);
                    });
                break;
            case 4:
                $strarray = $this->vertical_writing(4,$inToImg);
                $createdImg = Image::make($backImg)->text($strarray, 355, 390, function($font) {
                    $font->file(public_path().'/fonts/hkgokukaikk.ttf');
                    $font->size(60);
                    $font->align('center');
                    $font->color('#000000');
                    $font->angle(7);
                    });
                break;
        }
        return $createdImg;
    }
    
    public function vertical_writing($strlen,$inToImg,$break=PHP_EOL){
        $strarray = [];
        for($i=0; $i<$strlen; $i++){
            $strarray[] = mb_substr($inToImg,$i,1);
        }
        return implode($break,$strarray);
    }
}
