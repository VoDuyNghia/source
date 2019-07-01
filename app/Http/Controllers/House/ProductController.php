<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\ImageDetail;
use App\Model\Collection;


class ProductController extends Controller
{
    public function index($name, $id) {
    	$objProducts = Product::where('active_id',2)->where('id',$id)->first();
    	$objImage	 = ImageDetail::where('product_id',$id)->get();
    	$title		 = $objProducts['name'].' - '.$objProducts->collection->name;
        return view("house.product.index",compact('title','objImage','title','objProducts'));
    }
}
