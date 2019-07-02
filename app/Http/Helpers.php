<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Helpers {
	public static function watermark_detail($image,$name,$url){
        $watermark     =  Image::make('logo.jpg');
        $img           =  Image::make($url.'/'.$name);
        //#1
        $watermarkSize = $img->width() - 20; //size of the image minus 20 margins
        //#2
        $watermarkSize = $img->width() / 2; //half of the image size
        //#3
        $resizePercentage = 70;//70% less then an actual image (play with this value)
        $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

        // resize watermark width keep height auto
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        //insert resized watermark to image center aligned
        $img->insert($watermark);
        //save new image
        $img->save($url.'/'.$name);
	}
}

?>