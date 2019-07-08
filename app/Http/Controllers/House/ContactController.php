<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Session;

class ContactController extends Controller
{
    public function index() {
    	

        if (session::get('locale') == "en") {
            $title          = "CONTACT | DA NANG RESIDENCE";
            $description    = "DaNang Residence will help you find the house for rent, apartment for rent, villa for rent in Da Nang as rapidly as possible. Phone: (84) 905 972 521.";
        } else {
            $title          = "LIÊN HỆ | DA NANG RESIDENCE";
            $description    = "DaNang Residence sẽ giúp bạn tìm nhà cho thuê, căn hộ cho thuê, biệt thự cho thuê tại Đà Nẵng càng nhanh càng tốt. Điện thoại: (84) 905 972 521";
        }
    	return view('house.contact.index',compact('title'))->with('description',$description)->with('image',asset('/public/templates/house/img/bg-img/logo.jpg'));
    }

    public function post_Contact(ContactRequest $request) {
        try {
            DB::beginTransaction();
            $data                  = $request->all();
            $objContact            = new Contact;
            if($objContact->add_Items($request, null)){
                DB::commit();
                $request->session()->flash('success','Bạn đã gửi tin thành công ! Chúng tôi sẽ trả lời trong thời gian sớm nhất');
                return redirect()->route('house.contact.index');
            } 
        } catch(\Exception $e) {
            DB::rollback();
            $request->session()->flash('fail','Gửi tin thất bại ! Vui lòng thử lại hoặc liên hệ qua Fanpage');
            return redirect()->route('house.contact.index');
        }
    }

    public function index_admin(){
        $objContact = Contact::get();
        return view('admin.contact.index',compact('objContact'));
    }

    public function reply_contact(Request $request ){
        try {
            DB::beginTransaction();
            $objContact         = Contact::findOrfail($request->input('id'));
            $objContact->reply  = $request->input('reply_id');
            $objContact->save();
            DB::commit();
            return response()->json(['success'=> 'Cập nhật thành công!']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=> 'Cập nhật thất bại!']);
        }
    }
}
