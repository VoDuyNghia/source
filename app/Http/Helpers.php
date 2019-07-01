<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Choose;
use App\Models\District;
use App\Models\ImageDetail;
use Intervention\Image\Facades\Image;
use App\Models\Active;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

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