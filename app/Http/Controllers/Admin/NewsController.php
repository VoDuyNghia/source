<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Active;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator,Redirect,Response,File;
use Helpers;

class NewsController extends Controller
{
   	public function __construct(Active $objActive, News $objNews){
        $this->objActive     = $objActive;
        $this->objNews       = $objNews;
    }

    public function index() {
    	$objNews = News::get();
    	return view('admin.news.index', compact('objNews'));
    }

    public function get_Add(){
    	$objActive	= $this->objActive->get_Active();
    	return view('admin.news.add', compact('objActive'));
    }


    public function post_Add(Request $request) {
        $file = $request->file('image_detail123');
        if(!is_null($file)){
            $fileName = $this->image_detail123 = time() . "_" . rand(5, 5000000).'_'. $request->image_detail123->getClientOriginalName();
            $request->fileName = $fileName;
        } else {
            $request->fileName = '';
        }

        try {
            if($this->objNews->add_Items($request)) {
                $url = "image/files/show_news";
                Helpers::watermark_detail($file,$fileName,$url);
                DB::commit();
                $request->session()->flash('msg','Thêm thành công');
                return redirect()->route('admin.news.index');
            }
        } catch(\Exception $e) {
        	DB::rollback();
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.news.add');
        }
    }

    public function post_Delete(Request $request) {
    	try {
    		$objNews	 = News::findOrfail($request->id);
            $patch_name   = 'image/files/show_news/'.$objNews['image'];
            File::delete($patch_name);

            $deletedRows = News::where('id', $request->id)->delete();
            return response()->json(['success'=> 'Xóa thành công!']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=> 'Xóa thất bại!']);
        }
    }


    public function get_Edit(Request $request, $id){
        $objActive  = $this->objActive->get_Active();
        $objNews    = News::findOrfail($request->id);
        return view('admin.news.edit', compact('objNews','objActive'));
    }

    public function post_Edit($id, Request $request) {
        $data                   = $request->all();
        $News                   = News::findOrfail($id);
        $images123              = $request->file('image_detail123');
        $data = $request->all();
        if(!isset($data['address'])) {
            $data['address'] = null;
        }

        if($images123) {
            $name123 = $request->fileName  = 'avatar_'.time() . "_" .rand(5, 5000000).'_'. $images123->getClientOriginalName();
        } else {
            $request->fileName  = $News['image'];
        }

        try {
            DB::beginTransaction();
            $objNews                = new News();
            $objItem                = $objNews->findOrfail($id);
            $objItem->name          = $data['name'];
            $objItem->name_vn       = $data['name_vn'];
            $objItem->detail        = $data['detail'];
            $objItem->detail_vn     = $data['detail_vn'];
            $objItem->content       = $data['description'];
            $objItem->content_vn    = $data['description_vn'];
            $objItem->active_id     = $data['active'];
            $objItem->address       = $data['address'];
            $objItem->image         = $request->fileName;
            if($objItem->save()){
                if($images123){
                    $url = "image/files/show_news";
                    Helpers::watermark_detail($images123,$name123,$url);

                    $oldimage123 = $_SERVER["DOCUMENT_ROOT"]. '/public/image/files/show_news/'.$News['image'];
                    if(file_exists($oldimage123)) {
                        unlink($oldimage123);
                    }
                }
                DB::commit();
                $request->session()->flash('msg','Sửa thành công');
                return redirect()->route('admin.news.index');
            }
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('msg','Sửa thất bại');
            return redirect()->route('admin.news.index',$id);
        }

    }

}
