<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Helpers {
	public static function watermark_detail($image,$name,$url){
        $watermark     =  Image::make(asset('/public/templates/house/img/blog-img/logo.jpg'));
        $img           =  Image::make($url.'/'.$name);
        //#1
        $watermarkSize = $img->width(); //size of the image minus 20 margins
        //#2
        $watermarkSize = $img->width(); //half of the image size
        //#3
        $resizePercentage = 0;//70% less then an actual image (play with this value)

        // resize watermark width keep height auto
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        //insert resized watermark to image center aligned
        $img->insert($watermark,'center');
        //save new image
        $img->save($url.'/'.$name);
	}
}

?>