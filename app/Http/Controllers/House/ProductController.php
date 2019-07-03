<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\ImageDetail;
use App\Model\Collection;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ProductController extends Controller
{
    public function index($name, $id) {
    	$objProducts = Product::where('active_id',2)->where('id',$id)->first();
    	$objImage	 = ImageDetail::where('product_id',$id)->get();
    	$title		 = $objProducts['name'].' - '.$objProducts->collection->name;
        
        return view("house.product.index",compact('title','objImage','title','objProducts'))->with('key_word', '')->with('key_word', '')->with('district','')->with('collection','')->with('choose','')->with('bedrooms','')->with('bathrooms','');;
    }

    public function post_ContactPR($name, $id, ContactRequest $request) {
    	$data 						=	$request->all();
    	$objContact 				=	new Contact;
    	$objContact->name 			=  	$data['username'];
    	$objContact->phone 			=  	$data['phone'];
    	$objContact->email 			=  	$data['email'];
    	$objContact->product_id 	=  	$id;

    	if($objContact->save()){
    		$request->session()->flash('success','Bạn đã gửi tin thành công ! Chúng tôi sẽ trả lời trong thời gian sớm nhất');
        	return redirect()->route('house.product.index', ['name'=>$name, 'id'=>$id]);
    	} else {
    		$request->session()->flash('fail','Gửi tin thất bại ! Vui lòng thử lại hoặc liên hệ qua Fanpage');
        	return redirect()->route('house.product.index', ['name'=>$name, 'id'=>$id]);
    	}
    }
}
