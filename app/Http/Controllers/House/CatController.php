<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;


class CatController extends Controller
{
    public function index($name){
        $collection = Collection::where('name_ascii',$name)->first();
    	$objProduct = Product::select('product.*','collection.*','product.name as title','product.id as id_title')->join('collection','collection.id','=','product.collection_id')->where('active_id',2)->where('name_ascii', $name)->paginate(1);
    	$title 		= $collection['name'];
    	return view('house.cat.index',compact('title','objProduct','collection','choose'))->with('key_word', '')->with('key_word', '')->with('district','')->with('collection','')->with('choose','')->with('bedrooms','')->with('bathrooms','');;
    }

    public function Ajax_Product(Request $request) {
    	$title ="5";
		$query = Product::select('product.*','collection.*','product.name as title','product.id as id_title')->join('collection','collection.id','=','product.collection_id')->where('active_id',2);

            if ($request->has('status') && !empty($request->status)) {
                switch ($request->status){
                    case 1://Mới nhất
                        $query = $query->orderByDesc('id_title')->limit(10);
                        break;
                    case 2://Mua
                        $query = $query->where('choose_id','1')->limit(10);
                        break;
                    case 3:// Cho thuê
                        $query = $query->where('choose_id', '=',2);
                        break;
                    case 4:// hết hàng
                        $query = $query->orderByDesc('price');
                        break;
                    case 5:// hết hàng
                        $query = $query->orderBy('price','ASC');
                        break;
                }
            }

            if($request->ajax()){
                $objProduct = $query
                    ->paginate(10)
                    ->appends(request()->query());
                $view = view('house.cat.ajax_product',compact(['objProduct','title']))->render();
                $test=  response()->json(['view' => $view],200);
            }
            $objProduct = $query->paginate(10)->appends(request()->query());
            return view('house.cat.index',compact(['objProduct','title']));
    }	
}
