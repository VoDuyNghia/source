<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\News;

class BlogController extends Controller
{
    public function index() {
    	$title      = "BLOGS | DA NANG RESIDENCE";
        $key_word   = "";
        $objNews    = News::where('active_id',2)->orderbyDESC('id')->paginate(10);
    	return view('house.blog.index',compact('title','objNews','key_word'));
    }

    public function detail_news($name, $id){
        $key_word   = "";
        $objNews    = News::findOrfail($id);
        $title      = $objNews['name']. " | BLOGS";
        return view('house.blog.detail',compact('objNews','title','key_word'));
    }

    public function search_blogs(Request $request) {
        $key_word   =  $request->search;
        $title      =  $key_word.' - Tìm Kiếm '.$key_word. " - BLOGS | DA NANG RESIDENCE";
        $objNews    =  News::where('active_id',2)->where('name', 'like','%'. $key_word.'%')->orwhere('detail', 'like','%'. $key_word.'%')->orwhere('content', 'like','%'. $key_word.'%')->paginate(10);
        return view('house.blog.search',compact('objNews','title','objNews','key_word'));
    }
}
