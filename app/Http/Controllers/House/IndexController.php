<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\News;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index() {
        $title 	     = "Trang Chủ";
        $objProducts = Product::where('active_id',2)->orderbyDESC('id')->take(9)->get();

        return view("house.index.index",compact('title','objProducts'))->with('key_word', '')->with('district','')->with('collection','')->with('choose','');
    }

    public function search(Request $request) {
        $key_word   =  $request->search;
        $title      =  $key_word.' - Tìm Kiếm '.$key_word. " | DA NANG RESIDENCE";

        $objNews    =  News::where('active_id',2)->where('name', 'like','%'. $key_word.'%')->orwhere('detail', 'like','%'. $key_word.'%')->orwhere('content', 'like','%'. $key_word.'%')->orderbyDESC('id')->paginate(10);

        $objProducts = Product::where('active_id',2)->where('name', 'like','%'. $key_word.'%')->orwhere('detail', 'like','%'. $key_word.'%')->orwhere('content', 'like','%'. $key_word.'%')->orwhere('price', 'like','%'. $key_word.'%')->orwhere('address', 'like','%'. $key_word.'%')->orderbyDESC('id')->paginate(10);
        return view('house.index.search',compact('title','objNews','objProducts','key_word'));
    }

    public function search_product(Request $request) {
        $title = "Tìm Kiếm Nâng Cao | DA NANG RESIDENCE";
        $query      = Product::query();       
        $filters = [
            'key_word'   => Input::get('input'),
            'district'   => Input::get('cities') ,
            'collection' => Input::get('collection'),
            'choose'     => Input::get('status'),
            'bedrooms'   => Input::get('bedrooms'),
            'bathrooms'  => Input::get('bathrooms'),
            'min_price'  => Input::get('min_price'),
        ];

        $key_word       = $filters["key_word"];
        $district       = $filters["district"];
        $collection     = $filters["collection"];
        $choose         = $filters["choose"];
        $bedrooms       = $filters["bedrooms"];
        $bathrooms      = $filters["bathrooms"];


        $objProducts   = Product::where(function ($query) use ($filters) {
            if (!empty($request->input)) {
                $query->where('eye_color', '=', $filters['eye_color']);

                $query = $query->where('id', 'like','%'.  $filters['key_word'].'%')
                ->orWhere('name', ' like','%'.  $filters['key_word'].'%')
                ->orWhere('detail', 'like','%'.  $filters['key_word'].'%')
                ->orWhere('content', 'like','%'.  $filters['key_word'].'%');
            }

            if (!empty($filters['district'])) {
                $query->where('district_id', '=', $filters['district']);
            }

            if (!empty($filters['collection'])) {
                $query->where('collection_id', '=', $filters['collection']);
            }

            if (!empty($filters['choose'])) {
                $query->where('choose_id', '=', $filters['choose']);
            }

            if (!empty($filters['bedrooms'])) {
                 $query->where('bedrooms', '=', $filters['bedrooms']);
            }

            if (!empty($filters['bathrooms'])) {
                 $query->where('bathrooms', '=', $filters['bathrooms']);
            }

            dd($filters['min_price']);


        })->get();
        
        return view('house.index.search_product',compact('objProducts','title','key_word','district','collection','choose'));
    }
}
