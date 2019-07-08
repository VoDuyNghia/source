<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use Session;

class PageController extends Controller
{
    public function about_us() {
    	if (session::get('locale') == "en") {
    		$title = "ABOUT US | DA NANG RESIDENCE";
    	} else {
    		$title = "VỀ CHÚNG TÔI | DA NANG RESIDENCE";
    	}
        
        $key_word  = "";
        $objPages  = Pages::where('id', '1')->first();
    	return view('house.page.about',compact('title','key_word','objPages'))->with('key_word', '')->with('key_word', '')->with('district','')->with('collection','')->with('choose','')->with('bedrooms','')->with('bathrooms','');
    }
}
