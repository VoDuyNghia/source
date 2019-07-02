<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
    	$title = "DA NANG RESIDENCE | CONTACT";
    	return view('house.contact.index',compact('title'));
    }

    public function post_Contact(ContactRequest $request) {
    	$data = $request->all();
    	$objContact 		= new Contact;
    	$objContact->name 	=  $data['username'];
    	$objContact->phone 	=  $data['phone'];
    	$objContact->email 	=  $data['email'];

    	if($objContact->save()){
    		// DB::commit();
    		$request->session()->flash('success','Bạn đã gửi tin thành công ! Chúng tôi sẽ trả lời trong thời gian sớm nhất');
        	return redirect()->route('house.contact.index');
    	} else {
    		$request->session()->flash('fail','Gửi tin thất bại ! Vui lòng thử lại hoặc liên hệ qua Fanpage');
        	return redirect()->route('house.contact.index');
    	}
    }
}
