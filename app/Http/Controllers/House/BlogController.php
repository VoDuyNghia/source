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
        $objNews    = News::where('active_id',2)->whereNull('address')->orderbyDESC('id')->paginate(10);
    	return view('house.blog.index',compact('title','objNews','key_word'));
    }

    public function detail_news($name, $id){
        $key_word   = "";
        $objNews    = News::findOrfail($id);
        $title      = $objNews['name']. " - BLOGS | DA NANG RESIDENCE";
        return view('house.blog.detail',compact('objNews','title','key_word'));
    }

    public function search_blogs(Request $request) {
        $key_word   =  $request->search;
        $title      =  $key_word.' - Tìm Kiếm '.$key_word. " - BLOGS | DA NANG RESIDENCE";
        $objNews    =  News::where('active_id',2)->where('name', 'like','%'. $key_word.'%')->orwhere('detail', 'like','%'. $key_word.'%')->orwhere('content', 'like','%'. $key_word.'%')->whereNull('address')->orderbyDESC('id')->paginate(1);
        return view('house.blog.search',compact('objNews','title','objNews','key_word'));
    }


    public function index_project() {
        $title      = "PROJECT | DA NANG RESIDENCE";
        $key_word   = "";
        $objNews    = News::where('active_id',2)->whereNotNull('address')->orderbyDESC('id')->paginate(10);
        return view('house.blog.project.index',compact('title','objNews','key_word'))->with('key_word', '')->with('key_word', '')->with('district','')->with('collection','')->with('choose','')->with('bedrooms','')->with('bathrooms','');
    }

    public function news_project($name,$id) {
        $key_word   = "";
        $objNews    = News::where('id',$id)->first();
        $title      = $objNews['name']. " - PROJECT | DA NANG RESIDENCE";
        return view('house.blog.project.detail',compact('objNews','title','key_word'));
    }

}
