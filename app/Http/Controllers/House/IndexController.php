<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Input;


class IndexController extends Controller
{
    public function index() {
        $title 	     = "Trang Chủ";
        $objProducts = Product::where('active_id',2)->orderbyDESC('id')->take(9)->get();
        return view("house.index.index",compact('title','objProducts'));
    }

    public function search(Request $request) {
    	$term  = Input::get('search');
    	$url   = Product::all();
        return view('house.index.search');
    }
}
